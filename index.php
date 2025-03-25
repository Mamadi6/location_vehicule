<?php

use App\Controller\HomeController;
use App\Controller\UserController;

include "vendor/autoload.php";

$userCtl = new UserController();
$homeCtl = new HomeController();



$homeCtl->home();
$userCtl->actionUser();