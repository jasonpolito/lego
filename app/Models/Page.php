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
    ];

    public const DEFAULT_TEMPLATE = 'landing_page';

    public const AVAILABLE_TEMPLATES = [
        [
            'value' => 'landing_page',
            'label' => 'Langing Page',
            'block_selection' => [
                'hero' => [],
                'sidebyside' => [],
                'cards' => [],
                'callout' => [],
            ],
        ],
        [
            'value' => 'empty',
            'label' => 'No Template',
            'block_selection' => [],
        ],
    ];

    public $slugAttributes = [
        'title',
    ];

    public function getTemplateLabelAttribute()
    {
        $template = collect(static::AVAILABLE_TEMPLATES)->firstWhere('value', $this->template);

        return $template['label'] ?? '';
    }

    public function getTemplateBlockSelectionAttribute()
    {
        $template = collect(static::AVAILABLE_TEMPLATES)->firstWhere('value', $this->template);

        return $template['block_selection'] ?? [];
    }

    public function prefillBlockSelection()
    {
        $i = 1;

        foreach ($this->template_block_selection as $type => $content) {
            app(\A17\Twill\Repositories\BlockRepository::class)->create([
                'blockable_id' => $this->id,
                'blockable_type' => static::class,
                'position' => $i++,
                'content' => $content,
                'type' => $type,
            ]);
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
}
