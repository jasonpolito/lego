@twillBlockTitle('Image')
@twillBlockIcon('image')

@formField('medias', [
'name' => 'flexible',
'label' => 'Image',
'default' => ' '
])

@include('admin.blocks.defaults.render')
@include('admin.blocks.defaults.block_id')