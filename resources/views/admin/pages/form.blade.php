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

<div style="display: flex; margin-bottom: 24px">
    <div style="width: 66%">
        <div style="margin-bottom: 24px">
            @formField('medias', [
            'name' => 'flexible',
            'label' => 'Main Image',
            ])
        </div>

    </div>
    <div style="width: 1rem"></div>
    <div style="width: 33%">
        @formField('tags')
        <div style="margin-top: -24px">
            @formField('color', [
            'label' => 'Page Color',
            'name' => 'page_color',
            'default' => null
            ])
        </div>
    </div>
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

@formFieldset(['id' => 'seo', 'title' => 'SEO', 'open' => false])

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