@php
use App\Models\Taxonomy;
$taxonomy_count = Taxonomy::count();
$meta_title_placeholder = 'A meta title refers to the text that is displayed on search engine result pages.';
$meta_description_placeholder = 'A meta description generally informs and interests users with a short summary of what a particular page is about. ';
$excerpt_placeholder = 'A short, relevant summary of what this particular page is about. ';

$tabs = [
    ['name' => 'content', 'label' => 'Content' ],
    ['name' => 'details', 'label' => 'Details' ],
    ['name' => 'seo', 'label' => 'SEO' ],
    ['name' => 'advanced', 'label' => 'Advanced' ],
];

if (count($page->taxonomyInputs())) {
    $tabs = [
    ['name' => 'content', 'label' => 'Content' ],
    ['name' => 'fields', 'label' => 'Custom Fields' ],
    ['name' => 'details', 'label' => 'Details' ],
    ['name' => 'seo', 'label' => 'SEO' ],
    ['name' => 'advanced', 'label' => 'Advanced' ],
    ];
}

@endphp
@extends('twill::layouts.form', [
'disableContentFieldset' => true
])

@section('sideFieldsets')

<a17-fieldset title="Options" id="options">

    @formField('input', [
    'type' =>'textarea',
    'placeholder' => $excerpt_placeholder,
    'name' => 'excerpt',
    'label' => 'Excerpt',
    ])

</a17-fieldset>

@endsection


@section('fieldsets')

@formFieldset(['id' => 'page', 'title' => 'Page', 'open' => true])

<a17-tabs :tabs="{{ Illuminate\Support\Js::from($tabs) }}">
    <div class="custom-tab custom-tab--content">

        @formField('block_editor', [
        'withoutSeparator' => true,
        'blocks' => config('cms.blocks.default')
        ])
    </div>

    <div class="custom-tab custom-tab--details">
        <div style="display: flex;">
            <div style="width: 50%">
                @formField('medias', [
                'name' => 'flexible',
                'label' => 'Main Image',
                ])
            </div>
            <div style="width: 1rem"></div>
            <div style="width: 50%">
                @formField('browser', [
                'moduleName' => 'taxonomies',
                'name' => 'taxonomies',
                'label' => 'Taxonomies',
                'sortable' => false,
                'max' => $taxonomy_count,
                'browserNote' => 'Refresh after saving to use taxonomy fields',
                'fieldNote' => 'Inherit additional fields on this page'
                ])
            </div>
        </div>
        <div style="display: flex;">
            <div style="width: 50%">
                @formField('tags')
            </div>
            <div style="width: 1rem"></div>
            <div style="width: 50%">
                @formField('color', [
                'label' => 'Page Color',
                'name' => 'page_color',
                'default' => null
                ])
            </div>
        </div>

    </div>


    <div class="custom-tab custom-tab--fields">

        @if (count($page->taxonomyInputs()))

        <div style="margin-bottom: 24px">

            @foreach ($page->taxonomyInputs() as $input)

            @if ($input['type'] == 'textarea')

            @formField('wysiwyg', [
            'name' => 'taxonomy' . $input['name'],
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

        </div>

        @endif
    </div>

    <div class="custom-tab custom-tab--seo">

        @formField('checkbox', [
        'name' => 'meta_noindex',
        'label' => 'Discourage search engines from indexing this page',
        ])

        <div style="display: flex;">
            <div style="width: 50%">
                @formField('input', [
                'name' => 'meta_title',
                'type' => 'textarea',
                'label' => 'Meta Title',
                'placeholder' => $meta_title_placeholder,
                'maxlength' => 80
                ])
        
                @formField('input', [
                'name' => 'meta_description',
                'placeholder' => $meta_description_placeholder,
                'type' => 'textarea',
                'maxlength' => 160,
                'label' => 'Meta Description',
                ])
            </div>
            <div style="width: 1rem"></div>
            <div style="width: 50%">
                @formField('input', [
                'name' => 'og_title',
                'type' => 'textarea',
                'placeholder' => $meta_title_placeholder,
                'label' => 'OpenGraph Title',
                'note' => 'Defaults to meta title',
                'maxlength' => 80
                ])
        
                @formField('input', [
                'name' => 'og_description',
                'type' => 'textarea',
                'maxlength' => 160,
                'label' => 'OpenGraph Description',
                'placeholder' => $meta_description_placeholder,
                'note' => 'Defaults to meta description',
                ])
            </div>
        </div>


        @formField('medias', [
        'name' => 'og_image',
        'fieldNote' => 'Default image is generated from title, main image, and page color',
        'label' => 'OpenGraph Image',
        ])

    </div>

    <div class="custom-tab custom-tab--advanced">
        @include('admin.blocks.defaults.head_body')
    </div>
</a17-tabs>

@endformFieldset


@endsection