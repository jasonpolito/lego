@php
$head_placeholder = 'Code to insert into

<head>';
    $head_label = 'Insert into

    <head>';
        $body_placeholder = 'Code to insert into

    <body>';
        $body_label = 'Insert into

<body>';
    @endphp

    @formField('input', [
    'label' => $head_label,
    'name' => 'global_head_insert_code',
    'placeholder' => $head_placeholder,
    'type' => 'textarea',
    ])

    @formField('input', [
    'label' => $body_label,
    'name' => 'global_body_insert_code',
    'placeholder' => $body_placeholder,
    'type' => 'textarea',
    ])