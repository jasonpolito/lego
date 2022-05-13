@php
$font_list = config('styles.font_options');
$font_options = [];
foreach ($font_list as $value) {
array_push($font_options, [
'label' => $value,
'value' => $value,
]);
}
@endphp
@extends('twill::layouts.settings', [
'disableContentFieldset' => true
])

@section('fieldsets')
@formFieldset(['id' => 'colors', 'title' => 'Colors', 'open' => true])
<div style="display: flex; align-items-center">
    <div style="width: 9rem;">
        @formField('color', [
        'name' => 'main_color_sdgagasdag',
        'label' => 'Primary'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 9rem;">
        @formField('color', [
        'name' => 'secondary_color_sdgagasdag',
        'label' => 'Secondary'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 9rem;">
        @formField('color', [
        'name' => 'canvas_color_sdgagasdag',
        'label' => 'Canvas'
        ])
    </div>
</div>
@endformFieldset

@formFieldset(['id' => 'details', 'title' => 'Details', 'open' => true])
<div style="display: flex; align-items-center">
    <div style="width: 15rem;">
        @formField('select', [
        'label' => 'Corners',
        'name' => 'rounded',
        'default' => 'rounded',
        'options' => [
        [
        'label' => 'Default',
        'value' => 'rounded'
        ],
        [
        'label' => 'Small',
        'value' => 'rounded-sm'
        ],
        [
        'label' => 'Medium',
        'value' => 'rounded-md'
        ],
        [
        'label' => 'Large',
        'value' => 'rounded-lg'
        ],
        [
        'label' => 'X-Large',
        'value' => 'rounded-xl'
        ],
        [
        'label' => '2X-Large',
        'value' => 'rounded-2xl'
        ],
        [
        'label' => '3X-Large',
        'value' => 'rounded-3xl'
        ],
        ]
        ])
    </div>
    <div style="width: 1rem"></div>
</div>
@endformFieldset


@formFieldset(['id' => 'fonts', 'title' => 'Typography', 'open' => true])
<div style="display: flex; align-items-center">
    <div style="width: 15rem;">
        @formField('select', [
        'label' => 'Body Font',
        'name' => 'font_body_g0j09sd09jdssd',
        'options' => $font_options,
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 15rem;">
        @formField('select', [
        'label' => 'Title Font',
        'name' => 'font_title_g0j09sd09jdssd',
        'options' => $font_options,
        ])
    </div>
</div>
@endformFieldset


@endsection