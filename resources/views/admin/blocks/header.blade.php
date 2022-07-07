@twillBlockTitle('Header')
@twillBlockIcon('website')

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'show_topbar',
    'label' => 'Show topbar',
    ])
</div>

@formConnectedFields(['keepAlive' => true,
'fieldName' => 'show_topbar',
'fieldValues' => true,
'renderForBlocks' => true
])

@formField('input', [
'type' => 'textarea',
'name' => 'topbar_content',
'label' => 'Topbar content',
])

@endformConnectedFields

@formField('medias', [
'name' => 'flexible',
'label' => 'Logo',
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'customize_logo',
    'label' => 'Customize logo style',
    ])
</div>

@formConnectedFields(['keepAlive' => true,
'fieldName' => 'customize_logo',
'fieldValues' => true,
'renderForBlocks' => true
])

@formField('input', [
'type' => 'textarea',
'name' => 'logo_style',
'label' => 'Logo CSS',
])

@endformConnectedFields

@include('admin.blocks.defaults.links')

@formField('select', [
'name' => 'theme',
'label' => 'Theme',
'default' => 'default',
'options' => [
[
'label' => 'Default',
'value' => 'default'
],
[
'label' => 'Dark',
'value' => 'dark'
]
]
])