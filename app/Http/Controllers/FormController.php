<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Post;
use App\Models\Variable;
use App\Repositories\FormRepository;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct(FormRepository $repository)
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

    static function parsePHP($content)
    {
        $content = htmlspecialchars_decode($content);
        $pattern = "/<\?\=(.*?)\?>/i";
        if (preg_match_all($pattern, $content, $matches)) {
            foreach ($matches as $match) {
                $search = $match[0];
                $code = \Str::replace('<?=', '', $search);
                $code = \Str::replace('?>', '', $code);
                eval('$value = ' . $code);
                $content = \Str::replace($search, $value, $content);
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
            $content = \Str::replace('<' . $el . '', '<' . $el . ' class="' . $css . '" ', $content);
        }
        return $content;
    }

    static function parseLists($content, $types = ['ol', 'ul'])
    {
        $class = [
            'ul' => 'disc',
            'ol' => 'decimal',
        ];
        foreach ($types as $type) {
            $content = \Str::replace("<$type>", "<$type class='pl-8 mb-8 leading-8 list-$class[$type] show-rhythm'>", $content);
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
        if (!\Str::contains(request()->url(), 'admin/')) {
            $content = self::parseElements($content);
            $content = self::parseLists($content);
            $content = self::parseLinks($content);
            $content = self::parseVariables($content);
            $content = self::parseUrlParams($content);
        }
        return $content;
    }

    public function show($slug = false)
    {

        if (empty($slug)) {
            $Form = Form::where('title', 'HomeForm')->first();
        } else {
            $Form = $this->repository->forNestedSlug($slug);
        }

        abort_unless($Form, 404);

        $view = view('public.Form', compact('Form'));
        $response = self::parseVariables($view);
        $response = self::parseUrlParams($response);

        return $response;
    }
}
