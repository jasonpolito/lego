<?php

use Illuminate\Support\Facades\Route;

// Register Twill routes here eg.
// Route::module('posts');


Route::group(['prefix' => 'pages'], function () {
    Route::module('pages');
    Route::get('posts', 'PageController@postsIndex')->name('admin.posts.index');
    Route::module('templates');
    Route::module('taxonomies');
});

Route::module('forms');
Route::module('partials');
Route::module('variables');
