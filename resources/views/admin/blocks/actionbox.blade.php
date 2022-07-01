@twillBlockTitle('Action Box')
@twillBlockIcon('revision-single')

@include('admin.blocks.defaults.title')

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
])

@include('admin.blocks.defaults.buttons')

@include('admin.blocks.defaults.block_id')