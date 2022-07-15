<?php

use A17\Twill\Models\Tag;
use App\Repositories\PageRepository;
use Illuminate\Support\Facades\Route;
use App\Models\Form;
use App\Models\Page;
use App\Models\Taxonomy;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/view-site', function () {
    return Redirect::to('/');
})->name('home');

Route::view('/styleguide', 'pages.styleguide')->name('stylguide');

Route::get('/admin', function () {
    return Redirect::to('/admin/pages/pages');
});

Route::post('/save-template/{id}', function (Request $request, $id) {
    $page = Page::find($id);
    ddd($page->blocks);
})->name('admin.template.create');

Route::get('/test', function (Request $request) {
    ddd(env('APP_URL'));
});

app(PageRepository::class)->setupRoutes();
