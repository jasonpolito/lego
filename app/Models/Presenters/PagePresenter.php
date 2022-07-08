<?php

namespace App\Models\Presenters;

use App\Models\Presenters\Presenter;

class PagePresenter extends Presenter
{
    public function fullSlugAsString()
    {
        return $this->permalinkBase;
    }

    public function pageType()
    {
        return \Str::title($this->page_type);
    }
}
