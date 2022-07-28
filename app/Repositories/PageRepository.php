<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Route;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\Behaviors\HandleTags;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Page;
use App\Http\Controllers\PageController;
use A17\Twill\Repositories\SettingRepository;
use App\Http\Controllers\ImageController;
use App\Models\Taxonomy;
use Google\Service\BeyondCorp\ImageConfig;
use Illuminate\Support\Facades\Storage;

class PageRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleNesting, HandleTags;

    protected $fieldsGroups = [];
    public $fieldsGroupsFormFieldNamesAutoPrefix = true;
    public $fieldsGroupsFormFieldNameSeparator = '.';

    public function __construct(Page $model)
    {
        // $fields = Taxonomy::all()->map(function ($item) {
        //     return $item->blocks()->get()->filter(function ($block) {
        //         return $block->type == 'taxonomy_input' && !empty($block->content['name']);
        //     })->map(function ($block) {
        //         return \Str::slug($block->content['name'], '_');
        //     });
        // })->flatten();
        // $this->fieldsGroups = [
        //     'taxonomy' => $fields,
        // ];
        $this->model = $model;
    }

    public function afterSave($page, $fields)
    {
        parent::afterSave($page, $fields);

        if ($page->wasRecentlyCreated) {
            $page->prefillBlockSelection();
        }
    }

    public static function setupRoutes()
    {
        Route::name('sitemap')->get('sitemap.xml', function () {
            $content = app(SettingRepository::class)->byKey('sitemap_content');
            if (empty($content)) {
                $pages = Page::where('published', true)->where('meta_noindex', false)->get();
                $content = view('sitemap', compact('pages'));
            }
            return response($content, 200)
                ->header('Content-Type', 'text/xml');
        });

        Route::name('robots')->get('robots.txt', function () {
            $content = app(SettingRepository::class)->byKey('robots_content');
            return response($content, 200)
                ->header('Content-Type', 'text/plain');
        });

        Route::name('page.show')->get('{slug?}', [PageController::class, 'show'])->where('slug', '.*');
    }

    public static function generateOpenGraphImage($model)
    {
        ImageController::makeOpenGraph($model);
    }
}
