<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use A17\Twill\Repositories\SettingRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/test', 'pages.test')->name('test');

Route::name('sitemap')->get('sitemap.xml', function () {
    $content = app(SettingRepository::class)->byKey('sitemap_content');
    if (empty($content)) {
        $pages = App\Models\Page::where('published', true)->where('noindex', false)->get();
        $content = view('sitemap', compact('pages'));
    }
    return response($content, 200)
        ->header('Content-Type', 'text/xml');
});

Route::name('robots')->get('robots.txt', function () {
    $content = app(SettingRepository::class)->byKey('robots_content');
    return response($content, 200)
        ->header('Content-Type', 'text/plain');
});

Route::name('page.show')->get('{slug?}', [PageController::class, 'show'])->where('slug', '.*');
