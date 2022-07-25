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
use App\Models\Variable;
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

Route::get('/favicon', function (Request $request) {

    $font_file = public_path("fonts/Roboto-Black.ttf");

    $hex = $page->page_color ?? app(SettingRepository::class)->byKey('main_color_sdgagasdag') ?? '#147fd9';
    $fonts = [
        "src" => $font_file,
        "title_size" => 84,
        "title_color" => "#ffffff",
        "company_size" => 40,
        "company_color" => "#ffffff",
    ];
    $w = 500;
    $company_name = Variable::where('search', 'company_name')->first() ? Variable::where('search', 'company_name')->first()->replace : (env('COMPANY_NAME') ?? " ");
    $initial = substr($company_name, 0, 1);
    $color = new Hex($hex);
    $rgb = (string) $color->toRgba();
    $img = Image::canvas($w, $w);

    $img->circle($w, $w / 2, $w / 2, function ($draw) use ($rgb, $w) {
        $draw->background($rgb);
    });

    $img->text($initial, $w / 2 + 10 + 20, $w / 2 + 30, function ($font) use ($fonts) {
        $font->file($fonts['src']);
        $font->color([0, 0, 0, 0.3]);
        $font->size(350);
        $font->align('center');
        $font->valign('middle');
    });

    $img->text($initial, $w / 2 + 10, $w / 2, function ($font) use ($fonts) {
        $font->file($fonts['src']);
        $font->color($fonts['company_color']);
        $font->size(350);
        $font->align('center');
        $font->valign('middle');
    });

    $dir = Str::slug($company_name, '_');
    $folder = public_path("img/$dir");
    if (!file_exists($folder)) {
        mkdir($folder);
    }

    $icons = [
        'apple-touch-icon.png' => 180,
        'favicon-32x32.png' => 32,
        'favicon-16x16.png' => 16,
    ];

    foreach ($icons as $icon => $w) {
        $img->fit($w, $w);
        $img->save(public_path("img/$dir/$icon"));
    }

    return $img->response();
})->name('admin.template.create');

app(PageRepository::class)->setupRoutes();
