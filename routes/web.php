<?php

use OzdemirBurak\Iris\Color\Hex;
use A17\Twill\Repositories\SettingRepository;
use A17\Twill\Models\Tag;
use App\Http\Controllers\ImageController;
use App\Repositories\PageRepository;
use Illuminate\Support\Facades\Route;
use App\Models\Form;
use App\Models\Page;
use App\Models\Taxonomy;
use App\Models\Template;
use Google\Service\BeyondCorp\ImageConfig;
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

Route::get('/automagic.jpg', function (Request $request) {
    $page = Page::orderBy('updated_at', 'DESC')->get()->first();
    return ImageController::makeOpenGraph($page);
})->name('admin.template.create');

app(PageRepository::class)->setupRoutes();
