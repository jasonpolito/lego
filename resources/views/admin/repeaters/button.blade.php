@twillRepeaterTitle('Button')
@twillRepeaterTitleField('text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add button')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'button'
    ])
</div>
{{-- 
@formField('input', [
'name' => 'btn_text',
'label' => 'Button Text',
'placeholder' => 'Learn more'
]) --}}

@include('admin.blocks.defaults.link')

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