@twillBlockTitle('Cards')
@twillBlockIcon('fix-grid')

<label style="margin-top: 35px; display: block">Card Sections</label>

@formField('repeater', ['type' => 'card_section'])

@include('admin.blocks.defaults.render')

@include('admin.blocks.defaults.block_id')