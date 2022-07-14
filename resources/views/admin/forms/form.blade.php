@extends('twill::layouts.form')

@section('contentFields')


@formField('input', [
'name' => 'recipients',
'label' => 'Recipient(s)',
'placeholder' => 'example@domain.com, example2@domain.com',
'note' => 'Separate with commas for multiple'
])

@formField('input', [
'name' => 'subject',
'label' => 'Email subject',
'note' => 'Administrators will recieve this email',
'placeholder' => 'Email subject',
])

@formField('wysiwyg', [
'toolbarOptions' => config('cms.toolbar_options'),
'editSource' => true,
'note' => 'Administrators will recieve this email',
'name' => 'email_content',
'label' => 'Email content',
'placeholder' => 'Email content',
])

@formField('input', [
'name' => 'autoresponder_subject',
'note' => 'Customers will recieve this email',
'label' => 'Autoresponder subject',
'placeholder' => 'Autoresponder subject',
])

@formField('wysiwyg', [
'toolbarOptions' => config('cms.toolbar_options'),
'editSource' => true,
'note' => 'Customers will recieve this email',
'name' => 'autoresponder_content',
'label' => 'Autoresponder content',
'placeholder' => 'Email content',
])

<div style="display: flex; align-items: center;">
    <div style="width: 50%">
        @formField('input', [
        'name' => 'submit_text',
        'label' => 'Submit button',
        'placeholder' => 'Send message',
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('input', [
        'name' => 'redirect_after_submit',
        'label' => 'Redirect to',
        'placeholder' => '/thank-you',
        'note' => 'URL to redirect after form submission'
        ])
    </div>
</div>

@formField('block_editor', [
'blocks' => [
'form_inputs'
]
])


@stop