<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Models\Presenters\PagePresenter;

class Page extends Model implements Sortable
{
    use HasBlocks, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition, HasNesting;

    protected $presenterAdmin = PagePresenter::class;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
        'meta_title',
        'meta_description',
        'meta_noindex',
        'og_title',
        'og_description',
        'template',
        'page_type',
    ];

    public const AVAILABLE_PAGE_TYPES = [
        [
            'value' => 'page',
            'label' => 'Page'
        ],
        [
            'value' => 'post',
            'label' => 'Post'
        ]
    ];

    public $slugAttributes = [
        'title',
    ];

    public function prefillBlockSelection()
    {
        if ($this->template) {
            $blocks = Template::find($this->template)->blocks;
            $i = 1;

            foreach ($blocks as $block) {
                app(\A17\Twill\Repositories\BlockRepository::class)->create([
                    'blockable_id' => $this->id,
                    'blockable_type' => static::class,
                    'position' => $i++,
                    'content' => $block->content,
                    'type' => $block->type,
                ]);
            }
        }
    }

    public $mediasParams = [
        'flexible' => [
            'flexible' => [
                [
                    'name' => 'flexible',
                    'ratio' => 0
                ]
            ],
        ],
    ];

    public function scopePosts($query)
    {
        return $query->where('page_type', 'post');
    }
}
