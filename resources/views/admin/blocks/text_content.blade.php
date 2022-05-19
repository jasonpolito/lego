@twillBlockTitle('Text Content')
@twillBlockIcon('text_content.png')

@formField('select', [
'name' => 'align',
'label' => 'Align Content',
'default' => 'start',
'options' => [
[
'value' => 'start',
'label' => 'Left',
],
[
'value' => 'center',
'label' => 'Center',
],
[
'value' => 'end',
'label' => 'Right',
],
]
])

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('block_options.toolbar_options'),
'placeholder' => 'Almost before we knew it, we had left the ground.',
'editSource' => true,
])