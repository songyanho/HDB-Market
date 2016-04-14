<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

define('IN_CORE_SYSTEM', true);

//error_reporting(E_ERROR ^ E_WARNING);
// create session
session_cache_limiter(false);
session_start();

// Loads all dependencies namely Slim Framework
require_once 'vendor/autoload.php';

// Slim Initialization
require_once 'Init.php';

// Loads all Middleware, Models, Controller
require_once 'Autoload.php';

// Middleware Injection, Dependencies Injection
require_once 'Injection.php';

// Propel Setup
require_once 'generated-conf/config.php';

$app->get('/redirect', function ($request, $response, $args){
    $user = $this->hdb->getUser();
    $role = HdbCore::getUserRole($user);
    $path = '';
    switch($role){
        case HdbCore::ROLE_NORMAL_USER:
            $path = HdbCore::ROLE_GUEST.'#public@landingPage';
            break;
        case HdbCore::ROLE_REALTOR:
            $path = HdbCore::ROLE_GUEST.'#public@landingPage';
            break;
        default:
            $path = HdbCore::ROLE_GUEST.'#public@landingPage';
            break;
    }
    $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor($path));
    return $response;
})->setName(HdbCore::ROLE_GUEST.'#public@redirect');

// Starts Slim Framework
$app->run();