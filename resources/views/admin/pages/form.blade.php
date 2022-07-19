@extends('twill::layouts.form', [
'disableContentFieldset' => true
])

@section('sideFieldsets')

<a17-fieldset title="Options" id="options">

    @formField('checkbox', [
    'name' => 'meta_noindex',
    'label' => 'Discourage search engines from indexing this page',
    ])

    @formField('input', [
    'type' =>'textarea',
    'name' => 'excerpt',
    'label' => 'Excerpt',
    ])

</a17-fieldset>

@endsection

@section('fieldsets')

<div style="display: flex; align-items: center; margin-top: -24px">
    <div style="width: 50%">
        @formField('tags')
        {{-- @formField('select', [
        'name' => 'page_type',
        'label' => 'Page Type',
        'default' => 'page',
        'options' => \App\Models\Page::AVAILABLE_PAGE_TYPES
        ]) --}}
    </div>
    {{-- <div style="width: 1rem"></div>
    <div style="width: 66%">

    </div> --}}
</div>


<div style="margin-bottom: 24px">
    @formField('medias', [
    'name' => 'flexible',
    'label' => 'Main Image',
    ])
</div>


@if ($page->taxonomy())

@formFieldset(['id' => 'taxonomy', 'title' => 'Page Fields', 'open' => true])

@foreach ($page->taxonomyInputs() as $input)

@if ($input['type'] == 'textarea')

@formField('wysiwyg', [
'name' => 'taxonomy.' . $input['name'],
'label' => $input['label'],
'placeholder' => $input['label'],
'note' => "Use in templates with @{{ page." . $input['name'] . " }}",
'toolbarOptions' => config('cms.toolbar_options'),
])

@else

@formField('input', [
'name' => "taxonomy." . $input['name'],
'note' => "Use in templates with @{{ page." . $input['name'] . " }}",
'label' => $input['label'],
'placeholder' => $input['label'],
])

@endif

@endforeach

@endformFieldset

@endif

@formField('block_editor', [
'blocks' => config('cms.blocks.default')
])

<div style="padding-top: 24px"></div>

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


    @endsection