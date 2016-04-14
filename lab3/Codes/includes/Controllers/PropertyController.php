<?php

use Propel\Runtime\Formatter\ObjectFormatter;

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

$app->group('/property', function(){
    $this->get('/view', function ($request, $response, $args){
        return $this->view->render($response, 'map-view.html', []); 
    })->setName(HdbCore::ROLE_NORMAL_USER.'#property@map.view');
    
    $this->get('/view/{id}/add-to-watchlist', function ($request, $response, $args){
        $listing = ListingQuery::create()->findPK($args["id"]);
        if($listing != null){
            $watchlist = WatchlistQuery::create()->filterByUser($this->hdb->getUser())->filterByListingId($args["id"])->find();
            if($watchlist->count() == 0){
                $watchlist = new Watchlist();
                $watchlist->setUser($this->hdb->getUser());
                $watchlist->setListing($listing);
                $watchlist->save();
            }else{
                foreach($watchlist as $v){
                    $v->delete();
                }
            }
        }
        $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@property.view', ['id'=> $args["id"]]));
        return $response;
    })->setName(HdbCore::ROLE_NORMAL_USER.'#property@view.addToWatchlist');
    
    $this->get('/view/{id}', function ($request, $response, $args){
        $listing = ListingQuery::create()->findPK($args["id"]);
        $watchlist = WatchlistQuery::create()->filterByListing($listing)->count();
        $filter = new Twig_SimpleFilter("watching", function ($listingId) {
            $watchlist = WatchlistQuery::create()->filterByUser($this->hdb->getUser())->filterByListingId($listingId)->find();
            if($watchlist->count() == 0)
                return false;
            return true;
        });
        $twig = $this->view->getEnvironment();
        $twig->addFilter($filter);
        $twigVars = ['topClass'=> 'st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs sidebar-r-25pc-lg sidebar-r-30pc',
                     'sidebar'=> true,
                     'listing'=> $listing,
                     'hasMap'=>true,
                     'watchlist'=>$watchlist];
        return $this->view->render($response, 'property.html', $twigVars); 
    })->setName(HdbCore::ROLE_GUEST.'#public@property.view');
    
    $this->get('/manager', function ($request, $response, $args){
        $listings = ListingQuery::create()->filterByRealtor($this->hdb->getUser())->orderByCreatedAt('desc')->find();
        return $this->view->render($response, 'property-list.html', ['listings'=>$listings]); 
    })->setName(HdbCore::ROLE_REALTOR.'#property@manager.list');
    
    $this->map(['get', 'post'], '/new[/{town}[/{block}[/{type}[/{model}]]]]', function ($request, $response, $args){
        $twigVars = ['hasMap'=>true];
        if($request->isPost()){
            $params = $request->getParsedBody();
//            Core::varDumpAndDie($_FILES);
            $hdbs = HdbQuery::create()->filterByTown($params["town"])
                                      ->filterByBlock($params["block"])
                                      ->filterByFlatType($params["type"])
                                      ->filterByFlatModel($params["model"])
                                      ->find();
            $hdb = null;
            foreach($hdbs as $v){
                $hdb = $v;
            }
//            Core::varDumpAndDie($hdb);
            
            $listing = new Listing();
            $listing->setTitle($params["title"]);
            $listing->setUnitNumber($params["unitNumber"]);
            $listing->setSize($params["size"]);
            $listing->setPrice($params["price"]);
            $listing->setDescription($params["description"]);
            $listing->setHdbId($hdb->getId());
            $listing->setRealtorId($this->hdb->getUser()->getId());
            $listing->save();
            
            $validextensions = array("jpeg", "jpg", "png");
            $target_path = 'uploads/';
            for($i=0; $i<count($_FILES['photo']['size']); $i++){
                $ext = explode('.', basename($_FILES['photo']['name'][$i]));//Explode file name from dot(.)
                $file_extension = end($ext); //Store extensions in the variable
                if (($_FILES["photo"]["size"][$i] < 100000000) && in_array($file_extension, $validextensions)) {
                    $temp = explode(".", $_FILES["photo"]["name"][$i]);
                    $newfilename = round(microtime(true)).time().rand(). '.' . end($temp);
                    if(move_uploaded_file($_FILES["photo"]["tmp_name"][$i], $target_path . $newfilename)){
                        $photo = new Photo();
                        $photo->setPath($target_path . $newfilename);
                        $listing->addPhoto($photo);
                        $listing->save();
                    }
                }
            }
            
            $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@property.view', ['id'=> $listing->getId()]));
            return $response;
        }
        if(isset($args["model"])){
            $twigVars['selectedModel'] = $args["model"];
        }
        if(isset($args["type"])){
            $models = HdbQuery::create()->filterByTown(strtoupper($args["town"]))->filterByBlock(strtoupper($args["block"]))->filterByFlatType($args["type"])->groupByFlatModel()->find();
            $twigVars['models'] = $models;
            $twigVars['selectedType'] = $args["type"];
        }
        if(isset($args["block"])){
            $types = HdbQuery::create()->filterByTown(strtoupper($args["town"]))->filterByBlock(strtoupper($args["block"]))->groupByFlatType()->find();
            $twigVars['types'] = $types;
            $twigVars['selectedBlock'] = $args["block"];
            $address = HdbQuery::create()->filterByTown(strtoupper($args["town"]))->groupByBlock()->findOne();
            $twigVars['selectedStreet'] = $address->getStreet();
        }
        if(isset($args["town"])){
            $blocks = HdbQuery::create()->filterByTown(strtoupper($args["town"]))->groupByBlock()->find();
            $twigVars['blocks'] = $blocks;
            $twigVars['selectedTown'] = $args["town"];
        }
        $con = \Propel\Runtime\Propel::getReadConnection(\Map\HdbTableMap::DATABASE_NAME);
        $query = "SELECT * FROM hdb GROUP BY town;";
        $stmt = $con->prepare($query);
        $res = $stmt->execute();
        $formatter = new ObjectFormatter();
        $formatter->setClass('Hdb'); //full qualified class name
        $towns = $formatter->format($con->getDataFetcher($stmt));
        $twigVars['towns'] = $towns;
        return $this->view->render($response, 'new-property.html', $twigVars);
    })->setName(HdbCore::ROLE_REALTOR.'#property@manager.create');
});