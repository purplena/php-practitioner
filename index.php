<?php

session_start();

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\{Request, Router};

Router::load('app/routes.php')->direct(Request::uri(), Request::method());
