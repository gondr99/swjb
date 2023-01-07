<?php

use Gondr\Core\Route;

Route::GET("/", "MainController@index");
Route::GET("/register", "UserController@registerPage");
Route::GET("/board", "BoardController@index");
Route::POST("/register", "UserController@registerProcess");

//로그인 관련 라우터
Route::GET("/login", "UserController@loginPage");
Route::POST("/login", "UserController@loginProcess");

if( user() ){
    //파일처리 관련 라우터
    Route::GET("/upload", "FileController@uploadPage");
    Route::POST("/upload", "FileController@uploadProcess");

    Route::GET("/list", "FileController@listPage");
}

