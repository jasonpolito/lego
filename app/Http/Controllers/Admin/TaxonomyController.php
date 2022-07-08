<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;

class TaxonomyController extends BaseModuleController
{
    protected $moduleName = 'taxonomies';

    protected $indexOptions = [
        'permalink' => false,
        'reorder' => true,
    ];

    protected $showOnlyParentItemsInBrowsers = true;

    protected $nestedItemsDepth = 1;
}
