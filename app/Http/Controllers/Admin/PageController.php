<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use App\Models\Page;

class PageController extends BaseModuleController
{
    protected $moduleName = 'pages';
    protected $permalinkBase = '';
    protected $nestedItemsDepth = 1;

    protected $indexOptions = [
        'reorder' => true,
        'duplicate' => true,
    ];

    protected $indexColumns = [
        'title' => [ // field column
            'title' => 'Title',
            'field' => 'title',
        ],
        'fullSlugAsString' => [ // field column
            'title' => 'URL',
            'field' => 'fullSlugAsString',
            'present' => true
        ],
    ];

    protected function formData($request)
    {
        $page = Page::find($request->route('page'));
        if ($page) {
            $data = [
                'customPermalink' => route('page.show', ['slug' => $page->getNestedSlug()]),
            ];
        } else {
            $data = [
                'customPermalink' => '',
            ];
        }
        return $data;
    }
}
