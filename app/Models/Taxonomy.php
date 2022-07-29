<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Taxonomy extends Model implements Sortable
{
    use HasBlocks, HasRevisions, HasPosition, HasNesting;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
    ];


    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
}
