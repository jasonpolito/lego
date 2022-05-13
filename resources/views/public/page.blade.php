@php
$page_data = [
    'meta_title' => $page->meta_title,
    'meta_description' => $page->meta_description,
    'meta_noindex' => $page->noindex,
];

@endphp

@push('meta')
    <meta property="og:title" content="{{ $page->og_title ?? $page->meta_title }}" />
    <meta property="og:description" content="{{ $page->og_description ?? $page->meta_description }}" />
    @if (!Str::contains($page->image('og_image', 'flexible'), 'data:image'))
        <meta property="og:image" content="{{ $page->image('og_image', 'flexible') }}" />
    @endif
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <link rel="canonical" href="{{ request()->url() }}">
    @if ($page->noindex)
        <meta name="robots" content="noindex">
    @endif
@endpush

@extends('layouts.default', ['page_data' => $page_data])

@section('content')
    {!! $page->renderBlocks(false) !!}
@endsection
