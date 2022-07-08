@extends('twill::layouts.form', [
'disableContentFieldset' => true
])

@section('sideFieldsets')

<a17-fieldset title="Options" id="options">
    @formField('checkbox', [
    'name' => 'meta_noindex',
    'label' => 'Discourage search engines from indexing this page',
    ])

    @formField('select', [
    'name' => 'page_type',
    'label' => 'Page Type',
    'default' => 'page',
    'options' => \App\Models\Page::AVAILABLE_PAGE_TYPES
    ])
</a17-fieldset>

@endsection

@section('fieldsets')
@formFieldset(['id' => 'seo', 'title' => 'SEO', 'open' => true])


@formField('input', [
'name' => 'meta_title',
'label' => 'Meta Title',
'maxlength' => 80
])

@formField('input', [
'name' => 'meta_description',
'type' => 'textarea',
'maxlength' => 160,
'label' => 'Meta Description',
])

@formField('input', [
'name' => 'og_title',
'label' => 'OpenGraph Title',
'maxlength' => 80
])

@formField('input', [
'name' => 'og_description',
'type' => 'textarea',
'maxlength' => 160,
'label' => 'OpenGraph Description',
])

@formField('medias', [
'name' => 'og_image',
'label' => 'OpenGraph Image',
])

@endformFieldset

@formField('block_editor', [
'blocks' => config('cms.blocks.default')
])

@endsection