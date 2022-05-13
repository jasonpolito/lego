<?php

namespace App\Models\Presenters;

use App\Models\Presenters\Presenter;

class PagePresenter extends Presenter
{
    public function fullSlugAsString()
    {
        return $this->permalinkBase;
    }
}