@php
$templates = \App\Models\Template::options();
@endphp

@include('twill::partials.create')

@formField('select', [
'name' => 'page_type',
'label' => 'Page Type',
'default' => 'page',
'options' => \App\Models\Page::AVAILABLE_PAGE_TYPES
])

@if ($item->template ?? false)

@else

@formField('select', [
'name' => 'template',
'label' => 'Template',
'default' => $templates[0]['value'],
'options' => $templates,
])

@endif