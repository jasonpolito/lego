@extends('layouts.mail')
@php
$inputs = get_block_children($form->blocks->first()->children, 'form_input');
@endphp
@section('content')
<h1>{{ $subject }}</h1>
{!! $content !!}
@endsection