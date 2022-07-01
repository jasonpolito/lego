@extends('layouts.mail')
@php
$inputs = get_block_children($form->blocks->first()->children, 'form_input');
@endphp
@section('content')
<h1>{{ $subject }}</h1>
{!! $content !!}
<h5>Message data:</h5>
<table>
    @foreach ($inputs as $input)
    @php
    $key = Str::slug($input->input('name'), '_');
    $val = $data[$key] ?? 'N/A';
    @endphp
    @if (is_array($val))
    @php
    $val = implode($val, ', ');
    @endphp
    @endif
    <tr>
        <td style="white-space: nowrap">{{ $input->input('name') }}</td>
        <td style="width: 100%; padding-left: 16px">{{ !empty(trim($val)) ? trim($val) : 'N/A' }}</td>
    </tr>
    @endforeach
</table>
@endsection