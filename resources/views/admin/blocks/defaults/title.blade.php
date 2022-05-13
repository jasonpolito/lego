@formField('input', [
'name' => 'title_text',
'label' => 'Title text',
'placeholder' => 'Masthead title'
])

@formField('checkbox', [
'name' => 'customize_title',
'label' => 'Customize title',
])

@formConnectedFields([
'fieldName' => 'customize_title',
'fieldValues' => true,
'renderForBlocks' => true
])



<div style="display: flex; align-items: center">
    <div style="width: 50%">
        @formField('select', [
        'name' => 'title_element',
        'label' => 'HTML element',
        'default' => 'h3',
        'options' => config('cms.blocks.options.titles')
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('select', [
        'name' => 'title_display_element',
        'label' => 'Display element',
        'default' => 'h2',
        'options' => config('cms.blocks.options.titles'),
        ])
    </div>
</div>

@endformConnectedFields