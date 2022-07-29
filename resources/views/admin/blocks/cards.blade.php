@twillBlockTitle('Cards')
@twillBlockIcon('fix-grid')

@php
$options = \A17\Twill\Models\Tag::all()->map(function ($tag) {
return [
'label' => $tag->name,
'value' => $tag->slug,
];
})->toArray();
@endphp

@formField('select', [
'name' => 'variant',
'default' => 'default',
'label' => 'Variant',
'options' => [
[
'label' => 'Default',
'value' => 'default',
],
[
'label' => 'Stacked',
'value' => 'stacked',
],
[
'label' => 'Stacked (reversed)',
'value' => 'stacked_reversed',
],
]
])

<div style="margin-top: -24px">
    @formField('checkbox', [
    'name' => 'use_pages',
    'default' => true,
    'border' => true,
    'label' => 'Use CMS pages'
    ])
</div>

<div style="margin-top: -24px">@include('admin.blocks.defaults.title')</div>

@formConnectedFields(['keepAlive'=> true,
'fieldName' => 'use_pages',
'fieldValues' => true,
'renderForBlocks' => true
])

<div style="margin-top: -12px; margin-bottom: 29px">
    @formField('multi_select', [
    'name' => 'tags',
    'unpack' => false,
    'label' => 'Tag(s)',
    'placeholder' => 'Select page tag(s)',
    'options' => $options
    ])
</div>

@endformConnectedFields

@formConnectedFields(['keepAlive'=> true,
'fieldName' => 'use_pages',
'fieldValues' => false,
'renderForBlocks' => true
])

<label style="margin-top: 24px; display: block">Cards</label>

@formField('repeater', ['type' => 'card'])
{{-- 
<label style="margin-top: 35px; display: block">Card Sections</label>

@formField('repeater', ['type' => 'card_section']) --}}

@endformConnectedFields

{{-- 
@php ob_start(); @endphp

<div style="display: flex">
    <div style="width: 100%">
        @formField('select', [
        'name' => 'style',
        'label' => 'Style',
        'default' => 'default',
        'options' => [
        [ 'label' => 'Default', 'value' => 'default' ],
        ]])
    </div>
</div>

@php
$extra = ob_get_contents();
ob_end_clean();
@endphp --}}

@include('admin.blocks.defaults.advanced')