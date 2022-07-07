@twillRepeaterTitle('Accordion Item')
@twillRepeaterTitleField('faq_title', ['hidePrefix' => true])
@twillRepeaterTrigger('Add accordion item')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'faq_item'
    ])
</div>

@formField('input', [
'name' => 'faq_title',
'label' => 'Accordion Title',
'placeholder' => 'Accordion title text',
])

@formField('wysiwyg', [
'name' => 'faq_content',
'label' => 'Accordion Content',
'placeholder' => 'Accordion content',
])

@include('admin.blocks.defaults.buttons')