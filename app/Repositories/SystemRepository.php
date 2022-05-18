<?php

namespace App\Repositories;

use OzdemirBurak\Iris\Color\Hex;
use A17\Twill\Repositories\SettingRepository;

class SystemRepository
{
    public const STEP_AMT = 10;

    public const CLASS_MAP = [
        'text' => 'color',
        'bg' => 'background-color',
    ];

    public const STATE_MAP = [
        'focus' => 'focus',
        'hover' => 'hover',
    ];

    public static function primaryColor()
    {
        return app(SettingRepository::class)->byKey('main_color_sdgagasdag');
    }

    public static function generateColorVarsArray($mid_color)
    {
        $arr = [];
        $primary = new Hex($mid_color);
        $arr['primary-50'] = (string) $primary->lighten(5 * self::STEP_AMT);
        for ($i = 4; $i > 0; $i--) {
            $color = $primary->lighten($i * self::STEP_AMT);
            $amount = 500 - ($i * 100);
            $arr["primary-{$amount}"] = (string) $color;
        }
        $arr['primary'] = (string) $primary;
        $arr['primary-500'] = (string) $primary;
        for ($i = 1; $i < 5; $i++) {
            $color = $primary->darken($i * 7);
            $amount = ($i * 100) + 500;
            $arr["primary-{$amount}"] = (string) $color;
        }
        $arr['primary-950'] = (string) $primary->darken(5.5 * self::STEP_AMT);
        return $arr;
    }

    public static function generateColorVarsCSS()
    {
        $primary = self::generateColorVarsArray(self::primaryColor());
        $css = ":root {\r\n";
        foreach ($primary as $name => $value) {
            $css .= "--color-$name: $value;\r\n";
        }
        $css .= "}";
        return $css;
    }

    public static function generateColorClassesCSS()
    {
        $primary = self::generateColorVarsArray(self::primaryColor());
        $css = "";
        foreach ($primary as $name => $value) {
            foreach (self::CLASS_MAP as $class => $declaration) {
                $css .= ".$class-$name { $declaration: var(--color-$name); }\r\n";
            }
        }
        $css .= "}";
        return $css;
    }

    public static function generateColorStateClassesCSS()
    {
        $primary = self::generateColorVarsArray(self::primaryColor());
        $css = "";
        foreach ($primary as $name => $value) {
            foreach (self::CLASS_MAP as $class => $declaration) {
                foreach (self::STATE_MAP as $state_class => $state) {
                    $css .= ".$state_class\:$class-$name:$state { $declaration: var(--color-$name); }\r\n";
                }
            }
        }
        $css .= "}";
        return $css;
    }

    public static function generateColorGroupStateClassesCSS()
    {
        $primary = self::generateColorVarsArray(self::primaryColor());
        $css = "";
        foreach ($primary as $name => $value) {
            foreach (self::CLASS_MAP as $class => $declaration) {
                foreach (self::STATE_MAP as $state_class => $state) {
                    $css .= ".group:$state .group-$state_class\:$class-$name { $declaration: var(--color-$name); }\r\n";
                }
            }
        }
        $css .= "}";
        return $css;
    }
}
