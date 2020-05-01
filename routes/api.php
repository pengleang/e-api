<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::Resource('/products','ProductController');
Route::apiResource('/products','ProductController');
//Route::Resource('/projects','ProjectController');
Route::apiResource('/projects','ProjectController');
Route::group(['prefix'=>'products'],function(){
    Route::apiResource('/{product}/reviews', 'ReviewController');
});
Route::group(['prefix'=>'projects'], function(){
    Route::apiResource('/{project}/owners','OwnerController');
});
