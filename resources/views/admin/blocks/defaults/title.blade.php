@formField('input', [
'name' => 'title_text',
'label' => 'Title text',
'placeholder' => 'Masthead title'
])
<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'customize_title',
    'label' => 'Customize title',
    ])
</div>

@formConnectedFields([
'fieldName' => 'customize_title',
'fieldValues' => true,
'renderForBlocks' => true
])

<div style="display: flex; align-items: center; margin-top: -24px">
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