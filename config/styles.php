<?php

$title_base = "last:mb-0 mb-4 md:mb-8 font-bold ";
$canvas_color = [
    'base' => 'gray',
    'light' => 'gray',
];


$colors = [
    'stroke' => [
        'default' => "edge-gray-300 dark:edge-gray-700 dark:focus:edge-primary-500",
    ]
];

return [
    'colors' => $colors,
    'base' => [
        'font-size' => '16px',
        'rounded' => 'rounded-md',
        'transition' => 'transition duration-200'
    ],
    'font_options' => [
        'Open Sans',
        'Merriweather',
        'Inter',
        'Barlow Condensed',
        'Inter',
        'Bungee',
        'Playfair Display',
        'Roboto Mono',
    ],
    'fonts' => [
        // 'body' => 'Roboto Mono',
        // 'body' => 'Open Sans',
        // 'body' => 'Merriweather',
        'body' => 'Inter',
        // 'alt' => 'Barlow Condensed',
        'title' => 'Inter',
        // 'title' => 'Bungee',
        // 'title' => 'Merriweather',
        // 'title' => 'Playfair Display',
        // 'title' => 'Roboto Mono',
    ],
    'typography' => [
        'p' => 'mb-8 text-base leading-8 last:mb-0',
        'h1' => $title_base . 'text-3xl leading-12 sm:text-4xl sm:leading-12 md:text-5xl md:leading-14',
        'h2' => $title_base . 'text-2xl leading-10 sm:text-3xl sm:leading-12 md:text-4xl md:leading-12',
        'h3' => $title_base . 'text-xl leading-8 sm:text-2xl sm:leading-10 md:text-3xl md:leading-12',
        'h4' => $title_base . 'text-lg leading-8 sm:text-xl sm:leading-8 md:text-2xl xl:leading-10',
        'h5' => $title_base . 'text-lg leading-8 sm:text-lg sm:leading-8 md:text-xl md:leading-10',
        'h6' => $title_base . 'text-base leading-8',
    ],
    'btn' => [
        'base' => 'text-center whitespace-nowrap text-center justify-center last:mb-0 mb-8 leading-8 align-top mr-2 last:mr-0 sm:mr-4',
        'text' => [
            'basic' => '',
            'material' => 'uppercase tracking-widest font-semibold',
        ],
        'variants' => [
            'basic' => 'text-white shadow-md hover:shadow-lg focus:shadow-lg',
            'ghost' => 'hover:opacity-90',
            'outline' => 'edge',
            'skeleton' => '',
        ],
        'sizes' => [
            'lg' => 'px-4 py-2 sm:py-4 sm:px-8',
            'sm' => 'px-3 text-sm',
            'base' => 'px-4 py-2 sm:px-6',
        ]
    ],
    'inputs' => [
        'text' => [
            'variants' => [
                'basic' => 'bg-transparent edge edge-gray-300 dark:edge-gray-700 dark:focus:edge-primary-500 focus:edge-primary-500 outline-none  appearance-none mb-4 leading-8 align-top mr-2 last:mr-0 sm:mr-4 h-12',
            ],
            'sizes' => [
                'lg' => 'px-4 py-2 sm:py-4 sm:px-8',
                'sm' => 'px-3 text-sm',
                'base' => 'px-4 py-2',
            ]
        ],
    ],
];
