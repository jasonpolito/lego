<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class VariableController extends BaseModuleController
{
    protected $moduleName = 'variables';

    protected $indexOptions = [
        'permalink' => false,
    ];

    protected $indexColumns = [
        'title' => [ // field column
            'title' => 'Title',
            'field' => 'title',
        ],
        'searchWithBrackets' => [ // field column
            'title' => 'Variable',
            'field' => 'searchWithBrackets',
            'present' => true
        ],
        'replace' => [ // field column
            'title' => 'Value',
            'field' => 'replace',
        ],
    ];
}