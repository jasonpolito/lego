@php
use A17\Twill\Repositories\SettingRepository;
$rounded = app(SettingRepository::class)->byKey('rounded_g0j09sd09jdssd');
@endphp
@extends('layouts.default')

@section('content')
{!! $item->renderBlocks(false) !!}
<div
    class="opacity-25 opacity-50 opacity-75 opacity-5 opacity-10 opacity-20 opacity-30 opacity-40 opacity-60 opacity-70 opacity-80 opacity-90 opacity-95">
</div>
@endsection