<?php

return [
    'pages' => [
        'title' => 'Pages',
        'route' => 'admin.pages.pages.index',
        'primary_navigation' => [
            'pages' => [
                'title' => 'Pages',
                'route' => 'admin.pages.pages.index',
            ],
            'templates' => [
                'title' => 'Templates',
                'route' => 'admin.pages.templates.index',
            ],
            'taxonomies' => [
                'title' => 'Taxonomies',
                'route' => 'admin.pages.taxonomies.index',
            ],
        ],
    ],
    'forms' => [
        'title' => 'Forms',
        'module' => true,
    ],
    'partials' => [
        'title' => 'Partials',
        'module' => true,
    ],
    'variables' => [
        'title' => 'Variables',
        'module' => true,
    ],
    'settings' => [
        'title' => 'Global Settings',
        'route' => 'admin.settings',
        'params' => ['section' => 'global'],
        'primary_navigation' => [
            'global' => [
                'title' => 'Global',
                'route' => 'admin.settings',
                'params' => ['section' => 'global']
            ],
            'sitemap' => [
                'title' => 'Sitemap & Robots',
                'route' => 'admin.settings',
                'params' => ['section' => 'sitemap']
            ],
        ]
    ],
];
