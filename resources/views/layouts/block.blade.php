@yield('fields')

<div style="margin: 24px 0 -24px; border-top: solid 1px #eee">
</div>

@formField('checkbox', [
'name' => 'show_advanced_options',
'default' => false,
'label' => 'Advanced options'
])

@formConnectedFields([
'keepAlive' => true,
'fieldName' => 'show_advanced_options',
'fieldValues' => true,
'renderForBlocks' => true
])

<div style="margin-top: -24px">
    @include('admin.blocks.defaults.block_id')

    @formField('checkbox', [
    'name' => 'full_width_container',
    'default' => false,
    'label' => 'Full width container'
    ])

    @yield('advanced')

    @include('admin.blocks.defaults.render')
</div>

@endformConnectedFields