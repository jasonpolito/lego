<?php

use A17\Twill\Repositories\SettingRepository;

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
