<?php

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

// Dependencies injection
$container = $app->getContainer();
$container['hdb'] = function($c){
    return HdbCore::createOrRetrieve();
};

// Middleware Initialization and Injection
//$app->add( new \TwigVariableInjectionMiddleware(Core::class, $container));
$app->add( new \TwigVariableInjectionMiddleware(Core::class, $container));
$app->add( new \Authentication(Core::class, $container));