@twillBlockTitle('Callout')
@twillBlockIcon('revision-single')

@include('admin.blocks.defaults.align')

@include('admin.blocks.defaults.title')

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('cms.toolbar_options'),
'placeholder' => 'Almost before we knew it, we had left the ground.',
'editSource' => true,
])

@formField('medias', [
'name' => 'flexible',
'label' => 'Background Image',
])

@include('admin.blocks.defaults.buttons')

@include('admin.blocks.defaults.advanced')