@twillBlockTitle('Sponsors')
@twillBlockIcon('website')

@include('admin.blocks.defaults.title')

@include('admin.components.title', ['text' => 'Sponsors'])

@formField('repeater', ['type' => 'sponsor_section'])

@include('admin.blocks.defaults.block_id')