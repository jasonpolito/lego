<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Taxonomy;

class TaxonomyRepository extends ModuleRepository
{
    use HandleBlocks, HandleRevisions, HandleNesting;

    public function __construct(Taxonomy $model)
    {
        $this->model = $model;
    }
}
