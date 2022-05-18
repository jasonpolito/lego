@twillRepeaterTitle('Link')
@twillRepeaterTitleField('text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add link')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'link_item'
    ])
</div>

@formField('input', [
'name' => 'text',
'label' => 'Text',
'placeholder' => 'Years of experience'
])

@formField('input', [
'name' => 'url',
'label' => 'URL',
'placeholder' => 'https://google.com'
])

@formField('checkbox', [
'name' => 'external',
'label' => 'Open in new tab',
])