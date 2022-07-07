<?php

namespace App\Models\Presenters;

use App\Models\Presenters\Presenter;

class VariablePresenter extends Presenter
{
    public function searchWithBrackets()
    {
        return "<code style='font-family: monospace'>{{ $this->search }}</code>";
    }
}
