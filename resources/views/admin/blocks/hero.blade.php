@twillBlockTitle('Hero')
@twillBlockIcon('hero.png')


@include('admin.blocks.defaults.title')

@include('admin.blocks.defaults.align')


@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('block_options.toolbar_options'),
'placeholder' => 'Almost before we knew it, we had left the ground.',
'editSource' => true,
])

@formField('medias', [
'name' => 'flexible',
'label' => 'Background Image',
])

@formField('checkbox', [
'name' => 'fullscreen',
'label' => 'Fullscreen',
])

@include('admin.blocks.defaults.buttons')