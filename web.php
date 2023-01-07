<?php

use Gondr\Core\Route;

Route::GET("/", "MainController@index");
Route::GET("/register", "MainController@registerPage");
Route::GET("/board", "BoardController@index");

