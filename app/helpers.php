<?php

use A17\Twill\Repositories\SettingRepository;
use App\Models\Page;

function get_post()
{
    $post = Page::posts()->get()->filter(function ($post) {
        return $post->getNestedSlug() == request()->path();
    })->first();
    return $post ?? false;
}

function link_url($block)
{
    if (env('STACK_VERSION') < 1) return $block->input('url') ?? '#';

    $is_custom = $block->input('custom_link');
    if ($is_custom) {
        return $block->input('url');
    } else {
        $page = Page::find($block->input('page_id'));
        if ($page) {
            if ($page->title == 'Homepage') return '/';
            return '/' . $page->nestedSlug;
        } else {
            return '#';
        }
    }
}

function link_text($block)
{
    if (env('STACK_VERSION') < 1) return $block->input('text');

    if (!empty($block->input('text'))) {
        return $block->input('text');
    } else {
        $page = Page::find($block->input('page_id'));
        if ($page) {
            return $page->title;
        } else {
            return '';
        }
    }
}

function has_img($img)
{
    return !Str::contains($img, 'data:image');
}

function fallback_img($img)
{
    return !Str::contains($img, 'data:image') ? $img : '/img/lego.png';
}

function get_block_children($children, $type)
{
    return $children->filter(function ($item) use ($type) {
        return $item->input('child_type') == $type;
    });
}

function settings($name)
{
    return app(SettingRepository::class)->byKey($name);
}

function lorem($conf)
{
    return array_rand(array_flip(config("lorem.$conf")), 1);
}

function loremImg($w = 800, $h = 600)
{
    return "https://picsum.photos/$w/$h";
}

function str_contains_from_array($str, array $arr)
{
    foreach ($arr as $a) {
        if (stripos($str, $a) !== false) return true;
    }
    return false;
}
