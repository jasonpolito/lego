@php
use App\Models\Form;
$forms = Form::all()->pluck('title', 'id');
@endphp

@twillBlockTitle('Form')
@twillBlockIcon('website')

@include('admin.blocks.defaults.title')

@formField('select', [
'name' => 'form_id',
'label' => 'Form',
'options' => $forms
])

@include('admin.blocks.defaults.advanced')