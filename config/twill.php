<?php

return [
    'enabled' => [
        'dashboard' => false,
        'settings' => true,
    ],
    'blocks' => [
        'save-partial' => [
            'title' => 'Example',
            'trigger' => 'Add Example Block',
            'components' => 'a17-block-save-partial',
            'compiled' => true
        ],
    ],
    'block_editor' => [
        'files' => ['bg_video'],
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
            'flexible2' => [
                'flexible2' => [
                    [
                        'name' => 'flexible2',
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
    ],
    'settings' =>  [
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
            'logo' => [
                'flexible' => [
                    [
                        'name' => 'flexible',
                        'ratio' => 0
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
    ]
];
