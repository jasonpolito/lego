@extends('twill::layouts.form', [
'disableContentFieldset' => true
])

{{-- @section('contentFields') --}}
@section('fieldsets')

@formField('block_editor', [
'blocks' => [
'taxonomy_inputs'
]
])
@stop