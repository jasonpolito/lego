@twillBlockTitle('Link Columns')
@twillBlockIcon('text-2col')

<label style="margin-top: 35px; display: block">Link Columns</label>

@formField('repeater', ['type' => 'link_column'])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'is_narrow',
    'label' => 'Narrow (less vertical padding)',
    ])
</div>

@include('admin.blocks.defaults.block_id')