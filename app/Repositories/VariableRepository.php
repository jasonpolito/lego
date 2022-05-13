<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Variable;

class VariableRepository extends ModuleRepository
{
    use HandleRevisions;

    public function __construct(Variable $model)
    {
        $this->model = $model;
    }
}
