@twillRepeaterTitle('Options')
@twillRepeaterTitleField('text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add option')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'link_item'
    ])
</div>

@formField('input', [
'name' => 'text',
'label' => 'Option text',
'placeholder' => 'Option Text Here'
])