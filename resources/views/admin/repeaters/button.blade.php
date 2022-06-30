@twillRepeaterTitle('Button')
@twillRepeaterTitleField('btn_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add button')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'button'
    ])
</div>

<div style="display: flex">
    <div style="width: 50%">
        @formField('input', [
        'name' => 'btn_text',
        'label' => 'Button Text',
        'placeholder' => 'Learn more'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('input', [
        'name' => 'btn_url',
        'label' => 'Button URL',
        'placeholder' => 'https://google.com'
        ])
    </div>
</div>


<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'btn_external',
    'label' => 'Open in new tab',
    ])
</div>

@formField('select', [
'name' => 'btn_style',
'label' => 'Button style',
'default' => 'default',
'options' => [
[
'label' => 'Default',
'value' => 'default',
],
[
'label' => 'Outlined',
'value' => 'outlined',
],
[
'label' => 'White',
'value' => 'white',
],
[
'label' => 'Underline',
'value' => 'underline',
],
[
'label' => 'Link',
'value' => 'link',
],
]
])