@php
$page_data = [
'meta_title' => $page->meta_title,
'meta_description' => $page->meta_description,
'meta_noindex' => $page->noindex,
];
@endphp

@push('meta')
<meta property="og:title" content="{{ $page->og_title ?? $page->meta_title ?? $page->title }}">
<meta property="og:description"
    content="{{ $page->og_description ?? $page->meta_description ?? $page->excerpt ?? $page->title }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ url("") }}">
<meta name="twitter:creator" content="{{ env('COMPANY_NAME') }}">
<meta name="twitter:title" content="{{ $page->og_title ?? $page->meta_title ?? $page->title }}">
<meta name="twitter:description"
    content="{{ $page->og_description ?? $page->meta_description ?? $page->excerpt ?? $page->title }}">
@if (!Str::contains($page->image('og_image', 'flexible'), 'data:image'))
<meta property="og:image" content="{{ url($page->image('og_image', 'flexible')) }}">
<meta name="twitter:image" content="{{ url($page->image('og_image', 'flexible')) }}">
@else
<meta property="og:image" content="{{ url('img/opengraph/' . Str::slug((string) $page->title, '-') . '.jpg') }}">
<meta name="twitter:image" content="{{ url('img/opengraph/' . Str::slug((string) $page->title, '-') . '.jpg') }}">
@endif
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">
<link rel="canonical" href="{{ request()->url() }}">
@if ($page->meta_noindex)
<meta name="robots" content="noindex">
@endif
{!! $page->head_code !!}
@endpush

@extends('layouts.default', ['page_data' => $page_data])

@section('content')
{!! $page->renderBlocks(false) !!}
@endsection

@push('body_end')

{!! $page->body_code !!}

@endpush