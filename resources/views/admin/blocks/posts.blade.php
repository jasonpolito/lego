@php
$options = \A17\Twill\Models\Tag::all()->map(function ($tag) {
return [
'label' => $tag->name,
'value' => $tag->slug,
];
})->toArray();
@endphp

@twillBlockTitle('Pages')
@twillBlockIcon('media-list')

@include('admin.blocks.defaults.title')

@formField('select', [
'name' => 'tags',
'label' => 'Tag',
'placeholder' => 'Select a page tag',
'options' => $options
])

@formField('select', [
'name' => 'limit',
'label' => 'Number of pages',
'default' => 'all',
'options' => [
[
'label' => 1,
'value' => 1,
],
[
'label' => 2,
'value' => 2,
],
[
'label' => 3,
'value' => 3,
],
[
'label' => 4,
'value' => 4,
],
[
'label' => 5,
'value' => 5,
],
[
'label' => 6,
'value' => 6,
],
[
'label' => 'All',
'value' => 'all',
]
]
])

@include('admin.blocks.defaults.advanced')