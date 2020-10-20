<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('cms')->group(function() {
    Route::resource('/curriculum', 'CMS\CurriculumsController');
    Route::resource('/unit', 'CMS\UnitsController');
    Route::resource('/video', 'CMS\VideosController');
    Route::resource('/content', 'CMS\ContentsController');
    Route::resource('/tips', 'CMS\TipsController');
    Route::resource('/user', 'CMS\UsersController');

    Route::post ('/login', 'CMS\AuthController@login');
});