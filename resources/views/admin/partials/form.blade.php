@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
    'name' => 'title',
    'label' => 'Title',
    'maxlength' => 100
    ])

    @formField('block_editor', [
    'blocks' => [
    'callout', //
    'partial', //
    'header', //
    'footer', //
    'sidebyside', //
    'bigimage', //
    'pitchdeck', //
    'quote', //
    'html', //
    'conveyor', //
    ]
    ])
@stop
