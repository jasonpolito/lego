@twillBlockTitle('Action Box')
@twillBlockIcon('actionbox.png')

@include('admin.blocks.defaults.title')

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
])

@include('admin.blocks.defaults.buttons')