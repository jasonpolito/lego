<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use App\Models\Page;

class PageController extends BaseModuleController
{
    protected $moduleName = 'pages';
    protected $permalinkBase = '';
    protected $nestedItemsDepth = 3;

    protected $indexOptions = [
        'reorder' => true,
        'duplicate' => true,
        'sort' => true,
        'reorder' => true,
    ];

    protected $indexColumns = [
        'title' => [ // field column
            'title' => 'Title',
            'field' => 'title',
            'sort' => true,
        ],
        'page_type' => [ // field column
            'title' => 'Type',
            'sort' => true,
            'field' => 'pageType',
            'present' => true
        ],
    ];

    protected function formData($request)
    {
        $page = Page::find($request->route('page'));
        if ($page) {
            $data = [
                'page' => $page,
                'customPermalink' => route('page.show', ['slug' => $page->getNestedSlug()]),
            ];
        } else {
            $data = [
                'page' => $page,
                'customPermalink' => '',
            ];
        }
        return $data;
    }
}
