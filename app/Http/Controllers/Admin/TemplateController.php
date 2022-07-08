<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class TemplateController extends BaseModuleController
{
    protected $moduleName = 'templates';

    protected $indexOptions = [
        'permalink' => false,
        'duplicate' => true,
    ];
}
