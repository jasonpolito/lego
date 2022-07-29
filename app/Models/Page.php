<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use A17\Twill\Models\Tag;
use App\Models\Presenters\PagePresenter;
use App\Observers\PageObserver;

class Page extends Model implements Sortable
{
    use HasBlocks, HasSlug, HasMedias, HasFiles, HasRelated, HasRevisions, HasPosition, HasNesting;

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
        'content',
        'excerpt',
        'head_code',
        'body_code',
        'page_type',
        'page_color',
        'taxonomy',
    ];


    public $casts = [
        'taxonomy' => 'array',
    ];

    public const AVAILABLE_PAGE_TYPES = [
        [
            'value' => 'page',
            'label' => 'Basic'
        ],
        [
            'value' => 'post',
            'label' => 'Dynamic'
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
        return $query;
        return $query->where('page_type', 'post');
    }

    public function taxonomyModel()
    {
        $tags = $this->tags()->get()->map(function ($item) {
            return $item->name;
        })->toArray();
        return Taxonomy::whereIn('title', $tags)->first();
    }

    public function taxonomyFieldGroups()
    {
        $names = array_map(function ($item) {
            return $item['name'];
        }, $this->taxonomyInputs());
        return $names;
    }

    public function taxonomyInputs()
    {
        $inputs = $this->getRelated('taxonomies')->map(function ($taxonomy) {
            $block_inputs = $taxonomy->blocks()->get()->filter(function ($block) {
                return $block->type == 'taxonomy_input';
            })->map(function ($block) {
                $content = $block->content;
                $content['label'] = $content['name'];
                $content['name'] = \Str::slug($content['name'], '_');
                return $content;
            })->toArray();
            // ddd($block_inputs);
            return $block_inputs;
        })->toArray();
        if (count($inputs)) {
            $inputs = array_reduce($inputs, 'array_merge', []);
            return $inputs;
        }
        return [];
    }

    public function taxonomies()
    {
        return $this->belongsToMany(Taxonomy::class);
    }
}
