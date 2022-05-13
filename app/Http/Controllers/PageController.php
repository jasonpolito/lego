<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Variable;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    static function parseVariables($content)
    {
        $vars = Variable::all(['search', 'replace']);
        foreach ($vars as $var) {
            $regex = "/{{\s*$var->search\s*}}/i";
            $replace = $var->replace;
            $content = preg_replace($regex, $replace, $content);
        }
        return $content;
    }

    static function parseUrlParams($content)
    {
        $params = request()->all();
        if (count($params)) {
            foreach ($params as $key => $val) {
                $key = str_replace('"', "", str_replace("'", "", $key));
                $regex = "/{{\s*url_param\([\'\"]?($key)[\'\"]?\)\s*}}/i";
                $replace = $val;
                $content = preg_replace($regex, $replace, $content);
            }
        }
        return $content;
    }

    static function parseElements($content)
    {
        $els = [
            'h1', //
            'h2',
            'h3',
            'h4',
            'h5',
            'p',
        ];
        foreach ($els as $el) {
            $css = config('styles.typography')[$el] . ' show-rhythm';
            $content = \Str::replace('<' . $el . '>', '<' . $el . ' class="' . $css . '">', $content);
        }
        return $content;
    }

    static function parseLists($content, $types = ['ol', 'ul'])
    {
        foreach ($types as $type) {
            $content = \Str::replace("<$type>", "<$type class='pl-8 mb-8 leading-8 list-decimal show-rhythm'>", $content);
        }
        return $content;
    }

    static function parseLinks($content)
    {
        $content = \Str::replace('<a href', '<span class="text-primary whitespace-nowrap"><a href', $content);
        $content = \Str::replace('</a>', '</a></span>', $content);
        return $content;
    }

    static function parseTextContent($content)
    {
        $content = self::parseElements($content);
        $content = self::parseLists($content);
        $content = self::parseLinks($content);
        $content = self::parseVariables($content);
        $content = self::parseUrlParams($content);
        return $content;
    }

    public function show($slug = false)
    {

        if (empty($slug)) {
            $page = Page::where('title', 'Homepage')->first();
        } else {
            $page = $this->repository->forNestedSlug($slug);
        }

        abort_unless($page, 404);

        $view = view('public.page', compact('page'));
        $response = self::parseVariables($view);
        $response = self::parseUrlParams($response);

        return $response;
    }
}
