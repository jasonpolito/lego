@twillRepeaterTitle('Sponsor Item')
@twillRepeaterTrigger('Add sponsor')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'sponsor_item'
    ])
</div>

@formField('medias', [
'name' => 'flexible',
'label' => 'Sponsor image',
])

@formField('input', [
'name' => 'url',
'label' => 'Image URL',
'placeholder' => 'https://google.com'
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'external',
    'label' => 'Open in new tab',
    ])
</div>

@formField('input', [
'name' => 'width',
'label' => 'Image width',
'placeholder' => 'Image width in REMs'
])