@extends('twill::layouts.form', [
'disableContentFieldset' => true
])

@section('sideFieldsets')

<a17-fieldset title="Options" id="options">
    @formField('checkbox', [
    'name' => 'meta_noindex',
    'label' => 'Discourage search engines from indexing this page',
    ])

    @formField('tags')
    {{-- 
    @formField('select', [
    'name' => 'page_type',
    'label' => 'Page Type',
    'default' => 'page',
    'options' => \App\Models\Page::AVAILABLE_PAGE_TYPES
    ]) --}}

</a17-fieldset>

@endsection

@section('fieldsets')

<div style="margin-bottom: 24px">
    @formField('medias', [
    'name' => 'flexible',
    'label' => 'Main Image',
    ])
</div>


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

@if ($page->taxonomy())

@formFieldset(['id' => 'taxonomy', 'title' => 'Taxonomy', 'open' => false])

@foreach ($page->taxonomyInputs() as $input)

@if ($input['type'] == 'textarea')

@formField('wysiwyg', [
'name' => $input['name'],
'label' => $input['label'],
'placeholder' => $input['label'],
'toolbarOptions' => config('cms.toolbar_options'),
])

@else

@formField('input', [
'name' => $input['name'],
'label' => $input['label'],
'placeholder' => $input['label'],
])

@endif

@endforeach

@endformFieldset

@endif

@formFieldset(['id' => 'page', 'title' => 'Page Content', 'open' => false])

@formField('wysiwyg', [
'name' => 'excerpt',
'label' => 'Excerpt',
'toolbarOptions' => config('cms.toolbar_options'),
])

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('cms.toolbar_options'),
])


@endformFieldset


@formField('block_editor', [
'blocks' => config('cms.blocks.default')
])

<div style="padding-top: 24px">

    @formFieldset(['id' => 'advanced', 'title' => 'Advanced', 'open' => false])

    @formField('input', [
    'type' => 'textarea',
    'name' => 'head_code',
    'placeholder' => 'Code to insert into

    <head>',
        'label' => 'Head code'
        ])

        @formField('input', [
        'type' => 'textarea',
        'placeholder' => 'Code to insert into

    <body>',
        'name' => 'body_code',
        'label' => 'Body code'
        ])

        @endformFieldset

</div>

@endsection