<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Variable;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    static function parseVariables($content, $exclude = [])
    {
        $vars = Variable::whereNotIn('id', $exclude)->orderBy('created_at')->get(['search', 'replace', 'id']);
        foreach ($vars as $var) {
            $regex = "/{{\s*$var->search\s*}}/i";
            $replace = $var->replace;
            if (\Str::contains($replace, '{{')) {
                $replace = self::parseVariables($replace, [$var->id]);
            }
            $content = preg_replace($regex, $replace, $content);
        }
        return $content;
    }

    static function parseMustaches($content, $data = [], $include_vars = true)
    {
        $pattern = "/{{\s*(.*?)\s*}}/i";
        $value = false;
        if (preg_match_all($pattern, $content, $matches)) {
            foreach ($matches[0] as $match) {
                $search = $match;
                $key2 = false;
                $key = \Str::replace('{{', '', $search);
                $key = trim(\Str::replace('}}', '', $key));
                if (\Str::contains($key, 'page.')) {
                    $key = explode('page.', $key)[1];
                    $value = $data[$key] ?? ($data['taxonomy'][$key] ?? false);
                }
                if ($value) {
                    $content = \Str::replace($search, $value, $content);
                }
            }
        }
        if ($include_vars) {
            $content = self::parseVariables($content);
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

    static function parsePostVariables($content)
    {
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

        $page = false;
        if (empty($slug)) {
            $page = Page::where('title', 'Homepage')->first();
        } else {
            $page = $this->repository->forNestedSlug($slug);
        }

        $view = view('public.page', compact('page'));

        $page = $page ?? Page::where('title', '404')->first();

        if (!$page && auth('twill_users')->user()) {
            $page = Page::query()->get()->filter(function ($page) use ($slug) {
                return $page->nestedSlug == $slug;
            })->first();
            $view = view('public.page', compact('page'));
        }

        if ($page) {
            // ddd($page);
            $content = self::parseVariables($view);
            $content = self::parseUrlParams($content);
            $content = self::parseMustaches($content, $page->toArray(), false);
            $response = Response::make($content, 200);
            return $response;
        }

        abort_unless($page, 404);
    }
}
