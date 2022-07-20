<?php

use OzdemirBurak\Iris\Color\Hex;
use A17\Twill\Repositories\SettingRepository;
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

Route::get('/automagic.jpg', function (Request $request) {

    $width = 1200;
    $height = 628;
    $text =  wordwrap("Publix Awards $13,000 Grant to Jerry Doliner Food Bank", 16);
    $img_file = "lego3.jpg";
    $font = "SourceCodePro-Bold.ttf";
    $padding = $height / 7;

    $font_file = public_path("fonts/$font");
    $img = Image::make(public_path("img/$img_file"));
    $color = new Hex(app(SettingRepository::class)->byKey('main_color_sdgagasdag') ?? '#147fd9');
    $color = $color->saturate(10)->darken(25)->fade(60);
    $rgb = (string) $color->toRgba();

    $img->fit($width, $height);

    $img->rectangle(0, 0, $width, $height, function ($draw) use ($rgb) {
        $draw->background($rgb);
    });


    $img->text(env('COMPANY_NAME'), $padding + 5, $padding + 5, function ($font) use ($font_file) {
        $font->file($font_file);
        $font->size(40);
        $font->color([0, 0, 0, 0.1]);
        $font->valign('top');
    });
    $img->text($text, $padding + 5, $padding * 2.5 + 5, function ($font) use ($font_file) {
        $font->file($font_file);
        $font->size(72);
        $font->color([0, 0, 0, 0.2]);
        $font->valign('top');
    });
    $img->blur(10);


    $img->text(env('COMPANY_NAME'), $padding, $padding, function ($font) use ($font_file) {
        $font->file($font_file);
        $font->size(40);
        $font->color('#fff');
        $font->valign('top');
    });
    $img->text($text, $padding, $padding * 2.5, function ($font) use ($font_file) {
        $font->file($font_file);
        $font->size(72);
        $font->color('#fff');
        $font->valign('top');
    });

    $filename = \Str::slug($text, '-');
    $img->save(public_path("img/$filename.jpg"));

    return $img->response();
})->name('admin.template.create');

app(PageRepository::class)->setupRoutes();
