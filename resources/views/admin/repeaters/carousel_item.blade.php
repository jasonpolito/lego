@twillRepeaterTitle('Carousel item')
@twillRepeaterTitleField('title_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add carousel item')

@include('admin.components.title', ['text' => 'Carousel Items'])

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'carousel_item'
    ])
</div>

@include('admin.blocks.defaults.title')

@formField('input', [
'name' => 'content',
'type' => 'textarea',
'label' => 'Text Content',
])