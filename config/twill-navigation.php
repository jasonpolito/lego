<?php

return [
    'pages' => [
        'title' => 'Pages',
        'module' => true,
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
