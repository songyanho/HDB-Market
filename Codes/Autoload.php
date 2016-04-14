<?php

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

// Middleware
require_once 'includes/Middlewares/Authentication.php';
require_once 'includes/Middlewares/TwigVariableInjectionMiddleware.php';

// Dependencies
require_once './includes/Dependencies/HDB.php';

// System Models
require_once 'includes/Models/Core.php';
require_once 'includes/Models/AuthRoute.php';

require_once 'includes/Services/MailService.php';

// Controller
require_once 'includes/Controllers/LoginRegistration.php';
require_once 'includes/Controllers/LandingController.php';
require_once 'includes/Controllers/PropertyController.php';
require_once 'includes/Controllers/DataApiController.php';
require_once 'includes/Controllers/WatchlistController.php';
require_once 'includes/Controllers/RealtorController.php';

require_once 'includes/Sdk/facebook-php-sdk-v4/src/Facebook/autoload.php';