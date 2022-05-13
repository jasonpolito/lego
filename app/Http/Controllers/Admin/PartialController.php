<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class PartialController extends BaseModuleController
{
    protected $moduleName = 'partials';

    protected $indexOptions = [
        'permalink' => false,
        'duplicate' => true,
    ];
}