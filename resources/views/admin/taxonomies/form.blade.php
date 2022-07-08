@extends('twill::layouts.form')

@section('contentFields')
@formField('block_editor', [
'blocks' => [
'taxonomy_inputs'
]
])
@stop