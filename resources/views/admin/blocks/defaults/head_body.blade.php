@php
$body_placeholder = 'Code to insert into the <body> tag.';
$head_placeholder = 'Code to insert into the <head> tag.';
@endphp

@formField('input', [
'type' => 'textarea',
'name' => 'head_code',
'placeholder' => $head_placeholder,
'label' => 'Head code'
])

@formField('input', [
'type' => 'textarea',
'placeholder' => $body_placeholder,
'name' => 'body_code',
'label' => 'Body code'
])