<?php

namespace App\Traits;

trait InputTrait
{
    public $variant;
    public $size;
    public $css;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        ?string $variant = 'basic',
        ?string $size = 'base',
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->buildStyles();
    }

    public function buildStyles()
    {

        $res = config('styles.base.rounded');
        $styles = [
            "sizes.$this->size",
            "variants.$this->variant",
        ];
        foreach ($styles as $style) {
            $res .= ' ' . config("styles.inputs.text.$style");
        }
        $this->css = $res;
    }
}