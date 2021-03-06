<?php

use \Slim\App AS Slim;
// Slim Framework Initialization
$app = new Slim([
    'settings'          => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
    ],
    'twig'              => [
        'maintitle'         => 'HDB Market',
        'description'   => '',
        'author'        => 'Songyan Ho',
        'baseHref'      => 'http://hdb.local', // 'http://155.69.146.188/lilygame/doctor/stable/'
        'topClass'      => 'hide-sidebar top-navbar ls-bottom-footer-fixed'
    ],
    'view'              => function($c){
        $view = new \Slim\Views\Twig('templates', [
            'cache' => false // './cache'
        ]);
        // Instantiate and add Slim specific extension
        $view->addExtension(new \Slim\Views\TwigExtension(
            $c['router'],
            $c['request']->getUri()
        ));
        
        foreach ($c['twig'] as $name => $value) {
            $view->getEnvironment()->addGlobal($name, $value);
        }
        return $view;
    }
]);