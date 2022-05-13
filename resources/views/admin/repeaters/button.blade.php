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

@formField('input', [
'name' => 'btn_text',
'label' => 'Button Text',
'placeholder' => 'Learn more'
])

@formField('input', [
'name' => 'btn_url',
'label' => 'Button URL',
'placeholder' => 'https://google.com'
])

@formField('checkbox', [
'name' => 'btn_external',
'label' => 'Open in new tab',
])

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
'label' => 'Underline',
'value' => 'underline',
],
[
'label' => 'Link',
'value' => 'link',
],
]
])