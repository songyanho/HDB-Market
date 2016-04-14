<?php

use Propel\Runtime\Formatter\ObjectFormatter;

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

$app->group('/watchlist', function(){
    $this->get('/list', function ($request, $response, $args){
        $watchlists = WatchlistQuery::create()->filterByUser($this->hdb->getUser())->find();
        $listings = [];
        foreach($watchlists as $v){
            $listings[] = $v->getListing();
        }
        $twigVars = ['listings' => $listings];
        return $this->view->render($response, 'property-list.html', $twigVars); 
    })->setName(HdbCore::ROLE_NORMAL_USER.'#watchlist@list');
});