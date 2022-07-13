@twillBlockTitle('Logos')
@twillBlockIcon('star-feature_active')

@include('admin.blocks.defaults.title')

@include('admin.components.title', ['text' => 'Logos'])

@formField('repeater', ['type' => 'sponsor_section'])

@include('admin.blocks.defaults.block_id')