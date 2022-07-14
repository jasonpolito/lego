@formField('checkbox', [
'name' => 'fullscreen',
'label' => 'Fill viewport',
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'full_width_container',
    'default' => false,
    'label' => 'Full width container'
    ])
</div>

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'is_narrow',
    'label' => 'Reduced padding',
    ])
</div>