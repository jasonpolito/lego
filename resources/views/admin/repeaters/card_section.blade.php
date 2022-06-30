@twillRepeaterTitle('Card section')
@twillRepeaterTitleField('title_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add card section')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'card_section'
    ])
</div>

@include('admin.blocks.defaults.title')

<label style="margin-top: 35px; display: block">Cards</label>

@formField('repeater', ['type' => 'card'])