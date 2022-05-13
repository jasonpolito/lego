@extends('twill::layouts.form', [
'disableContentFieldset' => true
])


@section('fieldsets')
    @formFieldset(['id' => 'seo', 'title' => 'SEO', 'open' => true])

    @formField('checkbox', [
    'name' => 'noindex',
    'label' => 'No Index',
    ])

    @formField('input', [
    'name' => 'meta_title',
    'label' => 'Meta Title',
    'maxlength' => 100
    ])

    @formField('input', [
    'name' => 'meta_description',
    'type' => 'textarea',
    'label' => 'Meta Description',
    ])

    @formField('input', [
    'name' => 'og_title',
    'label' => 'OpenGraph Title',
    'maxlength' => 100
    ])

    @formField('input', [
    'name' => 'og_description',
    'type' => 'textarea',
    'label' => 'OpenGraph Description',
    ])

    @formField('medias', [
    'name' => 'og_image',
    'label' => 'OpenGraph Image',
    ])


    @endformFieldset

    @formFieldset(['id' => 'page_content', 'title' => 'Blocks', 'open' => true])

    @formField('block_editor', [
    'blocks' => config('cms.blocks.default')
    ])

    @endformFieldset
@endsection
