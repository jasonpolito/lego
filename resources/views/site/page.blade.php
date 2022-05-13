@php
use A17\Twill\Repositories\SettingRepository;
$rounded = app(SettingRepository::class)->byKey('rounded_g0j09sd09jdssd');
@endphp
@extends('layouts.default')

@section('content')
{!! $item->renderBlocks(false) !!}
@endsection