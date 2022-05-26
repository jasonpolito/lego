<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Route;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Page;
use App\Http\Controllers\PageController;
use A17\Twill\Repositories\SettingRepository;

class PageRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleNesting;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public static function setupRoutes()
    {
        Route::name('sitemap')->get('sitemap.xml', function () {
            $content = app(SettingRepository::class)->byKey('sitemap_content');
            if (empty($content)) {
                $pages = Page::where('published', true)->where('noindex', false)->get();
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
}
