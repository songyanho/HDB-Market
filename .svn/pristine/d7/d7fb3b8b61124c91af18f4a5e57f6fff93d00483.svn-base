<?php

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

$app->get('/', function ($request, $response, $args) { 
    $listings = ListingQuery::create()->orderByCreatedAt('desc')->limit(9)->find();
    return $this->view->render($response, 'landing-page.html', ['listings'=> $listings]); 
})->setName(HdbCore::ROLE_GUEST.'#public@landingPage');