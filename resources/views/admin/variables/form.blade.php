@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
    'name' => 'search',
    'label' => 'Variable',
    'note' => 'Does NOT include brackets: @{{ variable_name }}',
    'placeholder' => 'variable_name'
    ])
    @formField('input', [
    'name' => 'replace',
    'label' => 'Value',
    'placeholder' => '@{{ variable_name }} will be replaced with this content...',
    'type' => 'textarea',
    'rows' => 2
    ])
@stop
