@twillRepeaterTitle('Check Item')
@twillRepeaterTitleField('checklist_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add check item')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'checklist_item'
    ])
</div>

@formField('input', [
'name' => 'checklist_text',
'required' => true,
'label' => 'Text',
'placeholder' => 'Almost before we knew it, we had left the ground.',
])