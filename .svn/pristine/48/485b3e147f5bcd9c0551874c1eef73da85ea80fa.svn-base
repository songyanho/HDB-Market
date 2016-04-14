<?php

use Propel\Runtime\Formatter\ObjectFormatter;
use Propel\Runtime\ActiveQuery\Criteria;

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

$app->group('/realtor', function(){
    $this->get('/list', function ($request, $response, $args){
        $realtors = RealtorQuery::create()->orderByCreatedAt('desc')->find();
        return $this->view->render($response, 'realtor-list.html', ['realtors'=>$realtors]); 
    })->setName(HdbCore::ROLE_GUEST.'#public@realtor.list');
    
    $this->get('/listing/{id}', function ($request, $response, $args){
        $listings = ListingQuery::create()->filterByRealtorId($args["id"])->find();
        $realtor = RealtorQuery::create()->findPK($args["id"]);
        return $this->view->render($response, 'realtor-listing-list.html', ['listings'=>$listings, 'realtor'=>$realtor]); 
    })->setName(HdbCore::ROLE_GUEST.'#public@realtor.listings');
});