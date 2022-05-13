<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasPresenter;
use A17\Twill\Models\Model;
use App\Models\Presenters\VariablePresenter;

class Variable extends Model
{
    use HasRevisions, HasPosition;

    protected $presenterAdmin = VariablePresenter::class;

    protected $fillable = [
        'published',
        'title',
        'search',
        'replace',
        'description',
    ];
}