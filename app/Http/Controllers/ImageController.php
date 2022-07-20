<?php

namespace App\Http\Controllers;

use A17\Twill\Repositories\SettingRepository;
use Illuminate\Http\Request;
use OzdemirBurak\Iris\Color\Hex;

class ImageController extends Controller
{
    public static function makeOpenGraph($page)
    {
        $font_file = resource_path("fonts/SourceCodePro-Bold.ttf");
        $fonts = [
            "src" => $font_file,
            "title_size" => 84,
            "company_size" => 40,
        ];
        $width = 1200;
        $height = 628;
        $text =  wordwrap($page->title, 18);
        $padding = $height / 7;

        $img = \Image::make($page->image('flexible', 'flexible'));
        $color = new Hex(app(SettingRepository::class)->byKey('main_color_sdgagasdag') ?? '#147fd9');
        $color = $color->saturate(10)->darken(25)->fade(60);
        $rgb = (string) $color->toRgba();

        $img->rectangle(0, 0, $img->width(), $img->height(), function ($draw) use ($rgb) {
            $draw->background($rgb);
        });

        $img->fit($width, $height);


        $img->text(env('COMPANY_NAME'), $padding + 5, $padding + 5, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['company_size']);
            $font->color([0, 0, 0, 0.1]);
            $font->valign('top');
        });

        $img->text($text, $padding + 5, $padding * 2.25 + 5, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['title_size']);
            $font->color([0, 0, 0, 0.2]);
            $font->valign('top');
        });

        $img->blur(10);


        $img->text(env('COMPANY_NAME'), $padding, $padding, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['company_size']);
            $font->color('#fff');
            $font->valign('top');
        });
        $img->text($text, $padding, $padding * 2.25, function ($font) use ($fonts) {
            $font->file($fonts['src']);
            $font->size($fonts['title_size']);
            $font->color('#fff');
            $font->valign('top');
        });

        $filename = \Str::slug($text, '-');
        $img->save(public_path("img/$filename.png"));

        return $img->response();
    }
    //
}
