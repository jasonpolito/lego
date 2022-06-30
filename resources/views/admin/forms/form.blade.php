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
'placeholder' => 'Email subject',
])

@formField('wysiwyg', [
'toolbarOptions' => config('cms.toolbar_options'),
'editSource' => true,
'name' => 'email_content',
'label' => 'Email content',
'placeholder' => 'Email content',
])

@formField('input', [
'name' => 'autoresponder_subject',
'label' => 'Autoresponder subject',
'placeholder' => 'Autoresponder subject',
])

@formField('wysiwyg', [
'toolbarOptions' => config('cms.toolbar_options'),
'editSource' => true,
'name' => 'autoresponder',
'label' => 'Autoresponder content',
'placeholder' => 'Email content',
])

@formField('input', [
'name' => 'redirect_after_submit',
'label' => 'Redirect after submit',
'placeholder' => '/thank-you',
'note' => 'URL to redirect after form submission'
])

@formField('block_editor', [
'blocks' => [
'form_inputs'
]
])
@stop