@php
$templates = \App\Models\Template::options();
// ddd($templates);
@endphp

@formField('input', [
'name' => $titleFormKey ?? 'title',
'label' => $titleFormKey === 'title' ? twillTrans('twill::lang.modal.title-field') : ucfirst($titleFormKey),
'required' => true,
'onChange' => 'formatPermalink'
])

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

@if ($permalink ?? true)
@formField('input', [
'name' => 'slug',
'label' => 'Slug',
'ref' => 'permalink',
'prefix' => $permalinkPrefix ?? ''
])
@endif