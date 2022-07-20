<?php

namespace App\Http\Controllers;

use A17\Twill\Repositories\SettingRepository;
use App\Models\Variable;
use Illuminate\Http\Request;
use OzdemirBurak\Iris\Color\Hex;

class ImageController extends Controller
{
    public static function makeOpenGraph($page)
    {
        $font_file = public_path("fonts/SourceCodePro-Bold.ttf");
        $font_file = public_path("fonts/Roboto-Bold.ttf");
        $hex = app(SettingRepository::class)->byKey('main_color_sdgagasdag') ?? '#147fd9';
        $fonts = [
            "src" => $font_file,
            "title_size" => 84,
            "title_color" => "#ffffff",
            "company_size" => 40,
            "company_color" => "#ffffff",
        ];
        $blur = 10;
        $width = 1200;
        $height = 628;
        // $text =  wordwrap($page->title, 18); // Source Code Pro
        $text =  wordwrap($page->title, 22); // Roboto Bold
        $company_name = Variable::where('search', 'company_name')->first() ? Variable::where('search', 'company_name')->first()->replace : env('COMPANY_NAME');
        $padding = $height / 6.5;

        $img = \Image::make($page->image('flexible', 'flexible'));
        $color = new Hex($hex);
        $color = $color->saturate(10)->darken(25)->fade(60);
        $rgb = (string) $color->toRgba();

        $img->rectangle(0, 0, $img->width(), $img->height(), function ($draw) use ($rgb) {
            $draw->background($rgb);
        });

        $img->fit($width, $height);

        $img->text($company_name, $padding + 5, $padding + 5, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['company_size']);
            $font->color([0, 0, 0, 0.1]);
            $font->valign('top');
        });

        $img->text($text, $padding + 5, $padding * 1.95 + 5, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['title_size']);
            $font->color([0, 0, 0, 0.2]);
            $font->valign('top');
        });

        $img->blur($blur);
        // $img->pixelate(5);

        // $img->rectangle($padding, $padding, 1000, 150, function ($draw) use ($rgb) {
        //     $draw->background("#fff");
        // });
        $img->text($company_name, $padding, $padding, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['company_size']);
            $font->color($fonts['company_color']);
            $font->valign('top');
        });
        $img->text($text, $padding, $padding * 1.95, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['title_size']);
            $font->color($fonts['title_color']);
            $font->valign('top');
        });

        $filename = \Str::slug($text, '-');
        $img->save(public_path("img/opengraph/$filename.jpg"));

        return $img->response();
    }
    //
}
