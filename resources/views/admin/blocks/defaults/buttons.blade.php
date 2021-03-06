@include('admin.components.title', ['text' => 'Buttons'])

@formField('repeater', [
'type' => 'button'
])

@formField('select', [
'name' => 'align_buttons',
'default' => 'end',
'label' => 'Align buttons',
'options' => [
[
'label' => 'Left',
'value' => 'start',
],
[
'label' => 'Center',
'value' => 'center',
],
[
'label' => 'Right',
'value' => 'end',
],
]
])