@twillRepeaterTitle('Card')
@twillRepeaterTitleField('card_title', ['hidePrefix' => true])
@twillRepeaterTrigger('Add card')

@formField('input', [
'name' => 'card_title',
'label' => 'Card Text',
'placeholder' => 'Learn more'
])

@formField('input', [
'type' => 'textarea',
'name' => 'card_content',
'label' => 'Card Content',
'placeholder' => 'Almost before we knew it, we had left the ground.',
])

@formField('medias', [
'name' => 'flexible',
'label' => 'Card Image',
])

@include('admin.blocks.defaults.buttons')

@formField('checkbox', [
'name' => 'card_cover',
'label' => 'Card Cover',
])