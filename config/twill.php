<?php

return [
    'enabled' => [
        'dashboard' => true,
        'settings' => true,
    ],
    'block_editor' => [
        'crops' => [
            'sidebyside' => [
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 0
                    ]
                ],
                'tablet' => [
                    [
                        'name' => 'tablet',
                        'ratio' => 3 / 2
                    ]
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 3 / 2
                    ]
                ]
            ],
            'square' => [
                'square' => [
                    [
                        'name' => 'square',
                        'ratio' => 1
                    ]
                ],
            ],
            'flexible' => [
                'flexible' => [
                    [
                        'name' => 'flexible',
                        'ratio' => 0
                    ]
                ],
            ],
            'og_image' => [
                'flexible' => [
                    [
                        'name' => 'flexible',
                        'ratio' => 0
                    ]
                ],
            ],
            'big_image' => [
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 0
                    ]
                ],
                'tablet' => [
                    [
                        'name' => 'tablet',
                        'ratio' => 0
                    ]
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 0
                    ]
                ]
            ],
        ],
        'directories' => [
            'source' => [
                'blocks' => [
                    [
                        'path' => base_path('vendor/area17/twill/src/Commands/stubs/blocks'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_TWILL,
                    ],
                    [
                        'path' => resource_path('views/admin/blocks'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_APP,
                    ],
                ],
                'repeaters' => [
                    [
                        'path' => resource_path('views/admin/repeaters'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_APP,
                    ],
                    [
                        'path' => base_path('vendor/area17/twill/src/Commands/stubs/repeaters'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_TWILL,
                    ],
                ],
                'icons' => [
                    base_path('vendor/area17/twill/frontend/icons'),
                    resource_path('views/admin/icons'),
                ],
            ],
        ]
    ]
];
