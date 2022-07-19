@php
$page_data = [
'meta_title' => '404 - Page Not Found',
'meta_description' => '404 - Page Not Found',
'meta_noindex' => 1,
];
@endphp
@extends('layouts.default')
@section('content')
<x-section>
    <x-container class="py-8">
        <x-cols class="">
            <x-col class="w-full md:w-1/4 md:text-right lg:w-1/3">
                <x-title class="border-gray-300 text-primary md:border-r md:pr-8">404</x-title>
            </x-col>
            <x-col class="w-full md:w-3/4 lg:w-2/3">
                <x-title>Page Not Found</x-title>
                <p class="opacity-75 lg:-mt-8">Please check the URL in the address bar and try again.</p>
                {{-- <x-btn icon="" url="/">Go back home</x-btn>
                <x-btn variant="ghost">Contact support</x-btn> --}}
            </x-col>
        </x-cols>
    </x-container>
</x-section>
@endsection