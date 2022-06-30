<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Route;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Form;
use App\Http\Controllers\FormController;
use A17\Twill\Repositories\SettingRepository;

class FormRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleNesting;

    public function __construct(Form $model)
    {
        $this->model = $model;
    }
}
