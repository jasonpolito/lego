@twillRepeaterTitle('FAQ Item')
@twillRepeaterTitleField('faq_title', ['hidePrefix' => true])
@twillRepeaterTrigger('Add faq item')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'faq_item'
    ])
</div>

@formField('input', [
'name' => 'faq_title',
'label' => 'FAQ Title',
'placeholder' => 'FAQ question content',
])

@formField('wysiwyg', [
'name' => 'faq_content',
'label' => 'FAQ Content',
'placeholder' => 'FAQ content / answer',
])

@include('admin.blocks.defaults.buttons')