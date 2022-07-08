<?php

use A17\Twill\Models\Tag;
use App\Repositories\PageRepository;
use Illuminate\Support\Facades\Route;
use App\Models\Form;
use App\Models\Page;
use App\Models\Template;
use Illuminate\Http\Request;

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

Route::view('/styleguide', 'pages.styleguide')->name('stylguide');

Route::post('/save-template/{id}', function (Request $request, $id) {
    $page = Page::find($id);
    ddd($page->blocks);
})->name('admin.template.create');

Route::get('/test', function (Request $request) {
    $page = Page::find(2)->taxonomyInputs();
    ddd($page);
});

app(PageRepository::class)->setupRoutes();
