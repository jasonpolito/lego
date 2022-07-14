@twillBlockTitle('Action Box')
@twillBlockIcon('b-button')

@include('admin.blocks.defaults.title')

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
])

@include('admin.blocks.defaults.buttons')

@include('admin.blocks.defaults.advanced')