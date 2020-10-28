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
    Route::resource('/user', 'CMS\UsersController');

    // video material 
    Route::prefix('videomaterial')->group(function() {
        Route::resource('/unit', 'CMS\VideoMaterial\UnitsController');
        Route::resource('/video', 'CMS\VideoMaterial\VideosController');
        Route::resource('/content', 'CMS\VideoMaterial\ContentsController');
        Route::resource('/tips', 'CMS\VideoMaterial\TipsController');
    });

    // textbook 
    Route::prefix('textbook')->group(function() {
        Route::resource('/series', 'CMS\Textbook\SeriesController');
        Route::resource('/textbook', 'CMS\Textbook\TextbooksController');
        Route::resource('/unit', 'CMS\Textbook\UnitsController');
        Route::resource('/page', 'CMS\Textbook\PagesController');
    });

    Route::post('/login', 'CMS\AuthController@login');

    // for images on text builder
    Route::post('/upload-image-for-builder', 'CMS\MiscsController@page_builder_image_upload');
});