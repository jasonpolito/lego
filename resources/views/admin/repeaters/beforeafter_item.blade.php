@twillRepeaterTitle('Before/After Item')
@twillRepeaterTrigger('Add before/after item')

@formField('input', [
'name' => 'text',
'label' => 'Text',
])

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'beforeafter_item'
    ])
</div>

@formField('medias', [
'name' => 'flexible',
'label' => 'Before image',
])

@formField('medias', [
'name' => 'flexible2',
'label' => 'After image',
])