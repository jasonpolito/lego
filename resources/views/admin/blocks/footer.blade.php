@twillBlockTitle('Footer')
@twillBlockIcon('expand')

@include('admin.components.title', ['text' => 'Columns'])
@formField('repeater', ['type' => 'footer_column'])

@formField('wysiwyg', [
'name' => 'legal_copy',
'label' => 'Legal Copy',
'placeholder' => 'Copyright © 2022'
])

@include('admin.components.title', ['text' => 'Legal Links'])
@formField('repeater', ['type' => 'link_item'])