@twillBlockTitle('Footer')
@twillBlockIcon('expand')

@formField('select', [
'name' => 'type',
'label' => 'Footer Type',
'default' => 'simple',
'options' => [
[
'label' => 'Simple',
'value' => 'simple'
],
[
'label' => 'Complex',
'value' => 'complex'
]
]
])
