@twillRepeaterTitle('Card')
@twillRepeaterTitleField('title_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add card')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'card'
    ])
</div>

@formField('medias', [
'name' => 'flexible',
'label' => 'Card Image',
])

@include('admin.blocks.defaults.title', ['defaults' => [
'customize_title' => true,
'title_text' => 'Card Title',
'title_element' => 'h4',
'title_display_element' => 'h4',
]])

@formField('input', [
'type' => 'textarea',
'name' => 'card_content',
'label' => 'Card Content',
'placeholder' => 'Almost before we knew it, we had left the ground.',
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'link_card',
    'label' => 'Link card',
    'default' => true
    ])
</div>

@formConnectedFields(['keepAlive' => true,
'fieldName' => 'link_card',
'fieldValues' => true,
'renderForBlocks' => true
])

@include('admin.blocks.defaults.link')

@endformConnectedFields

@include('admin.blocks.defaults.buttons')