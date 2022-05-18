@extends('twill::layouts.form')

@section('contentFields')
@formField('input', [
'name' => 'title',
'label' => 'Title',
'maxlength' => 100
])

@formField('block_editor', [
'blocks' => array_merge(config('cms.blocks.default'), [
'header', //
'footer', //
])
])
@stop