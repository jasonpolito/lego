@php
$defaults = $defaults ?? [];
@endphp
@formField('input', [
'name' => 'title_text',
'label' => 'Title text',
'default' => $defaults['title_text'] ?? '',
'placeholder' => 'This is the title text'
])
<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'customize_title',
    'label' => 'Customize title',
    'default' => $defaults['customize_title'] ?? false,
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
        'default' => $defaults['title_element'] ?? 'h3',
        'options' => config('cms.blocks.options.titles')
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('select', [
        'name' => 'title_display_element',
        'label' => 'Display element',
        'default' => $defaults['title_display_element'] ?? 'h2',
        'options' => config('cms.blocks.options.titles'),
        ])
    </div>
</div>

@endformConnectedFields