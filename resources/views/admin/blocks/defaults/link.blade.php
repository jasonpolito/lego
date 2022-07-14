@php
$pages = App\Models\Page::all()->map(function($page) {
return [
'label' => $page['title'],
'value' => $page['id'],
];
})->toArray();
@endphp

<div style="margin-bottom: -24px">
    @formField('input', [
    'name' => 'text',
    'label' => 'Text',
    'placeholder' => 'Link text'
    ])
</div>

@formConnectedFields(['keepAlive' => true,
'fieldName' => 'custom_link',
'fieldValues' => false,
'renderForBlocks' => true
])

@formField('select', [
'name' => 'page_id',
'label' => 'URL',
'searchable' => true,
'placeholder' => 'Select page',
'options' => $pages
])

@endformConnectedFields

@formConnectedFields(['keepAlive' => true,
'fieldName' => 'custom_link',
'fieldValues' => true,
'renderForBlocks' => true
])

@formField('input', [
'name' => 'url',
'label' => 'URL',
'placeholder' => 'https://google.com'
])

@endformConnectedFields

<div style="display: flex; margin-top: -26px">
    <div style="padding-right: 1rem">
        @formField('checkbox', [
        'name' => 'custom_link',
        'label' => 'Custom URL',
        ])
    </div>
    <div style="padding-right: 1rem">
        @formField('checkbox', [
        'name' => 'external',
        'label' => 'New tab',
        ])
    </div>
</div>