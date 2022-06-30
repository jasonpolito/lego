@extends('layouts.mail')
@php
$inputs = get_block_children($form->blocks->first()->children, 'form_input');
@endphp
@section('title')
<h2 style="margin: 0">{{ $form->autoresponder_title }}</h2>
@endsection
@section('content')
{!! $form->autoresponder !!}
@endsection