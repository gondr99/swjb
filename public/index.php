<?php
session_start();

define("__ROOT", dirname( __DIR__ ));
define("__VIEW", __ROOT . "/Views");

require_once(__ROOT . "/autoload.php");
require_once(__ROOT . "/web.php");


Gondr\Core\Route::init(); //라우트 시작