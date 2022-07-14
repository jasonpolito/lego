<?php

namespace App\Repositories;

use OzdemirBurak\Iris\Color\Hex;
use A17\Twill\Repositories\SettingRepository;

class SystemRepository
{
    public const STEP_AMT = 10;

    public const CLASS_MAP = [
        'text' => 'color',
        'border' => 'border-color',
        'bg' => 'background-color',
    ];

    public const STATE_MAP = [
        'focus' => 'focus',
        'hover' => 'hover',
    ];

    public static function primaryColor()
    {
        return app(SettingRepository::class)->byKey('main_color_sdgagasdag') ?? '#147fd9';
    }

    public static function canvasColor()
    {
        return app(SettingRepository::class)->byKey('canvas_color_sdgagasdag') ?? '#212c36';
    }

    public static function generatePrimaryColorVarsArray($target)
    {
        if (!$target) return [];
        $arr = [];
        $primary = new Hex($target);
        $arr['primary-50'] = (string) $primary->lighten(6.125 * self::STEP_AMT);
        for ($i = 4; $i > 0; $i--) {
            $color = $primary->lighten($i * self::STEP_AMT);
            $amount = 500 - ($i * 100);
            $arr["primary-{$amount}"] = (string) $color;
        }
        $arr['primary'] = (string) $primary;
        $arr['primary-500'] = (string) $primary;
        for ($i = 1; $i < 5; $i++) {
            $color = $primary->darken($i * 6);
            $amount = ($i * 100) + 500;
            $arr["primary-{$amount}"] = (string) $color;
        }
        $arr['primary-950'] = (string) $primary->darken(5.5 * self::STEP_AMT);
        return $arr;
    }

    public static function generateCanvasColorVarsArray($target)
    {
        if (!$target) return [];
        $arr = [];
        $canvas = new Hex($target);
        $arr['canvas-content'] = (string) $canvas->lighten(55)->desaturate(10);
        $arr['canvas-mid'] = (string) $canvas->lighten(25)->desaturate(10);
        $arr['canvas-500'] = (string) $canvas;
        $arr['canvas-canvas'] = (string) $canvas->lighten(5)->desaturate(5);
        $arr['canvas'] = (string) $canvas;
        return $arr;
    }

    public static function generateColorVarsCSS()
    {
        $primary = self::generatePrimaryColorVarsArray(self::primaryColor());
        $canvas = self::generateCanvasColorVarsArray(self::canvasColor());
        $colors = array_merge($primary, $canvas);
        $css = ":root {\r\n";
        foreach ($colors as $name => $value) {
            $css .= "--color-$name: $value;\r\n";
        }
        $css .= "}";
        return $css;
    }

    public static function generateColorClassesCSS()
    {
        $primary = self::generatePrimaryColorVarsArray(self::primaryColor());
        $canvas = self::generateCanvasColorVarsArray(self::canvasColor());
        $colors = array_merge($primary, $canvas);
        $css = "";
        foreach ($colors as $name => $value) {
            foreach (self::CLASS_MAP as $class => $declaration) {
                $css .= ".$class-$name { $declaration: var(--color-$name); }\r\n";
            }
            $css .= ".to-$name { --tw-gradient-to: var(--color-$name); }\r\n";
            $css .= ".from-$name { --tw-gradient-from: var(--color-$name); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }\r\n";
        }
        $css .= "}";
        return $css;
    }

    public static function generateColorStateClassesCSS()
    {
        $primary = self::generatePrimaryColorVarsArray(self::primaryColor());
        $canvas = self::generateCanvasColorVarsArray(self::canvasColor());
        $colors = array_merge($primary, $canvas);
        $css = "";
        foreach ($colors as $name => $value) {
            foreach (self::STATE_MAP as $state_class => $state) {
                foreach (self::CLASS_MAP as $class => $declaration) {
                    $css .= ".$state_class\:$class-$name:$state { $declaration: var(--color-$name); }\r\n";
                    $css .= ".group:$state .group-$state_class\:$class-$name { $declaration: var(--color-$name); }\r\n";
                }
            }
        }
        $css .= "}";
        return $css;
    }
}
