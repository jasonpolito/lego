<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
// use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;

class FormController extends BaseModuleController
{
    protected $moduleName = 'forms';

    protected $indexOptions = [
        'permalink' => false,
        'duplicate' => true,
    ];
}
