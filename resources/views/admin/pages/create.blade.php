@formField('input', [
'name' => $titleFormKey ?? 'title',
'label' => $titleFormKey === 'title' ? twillTrans('twill::lang.modal.title-field') : ucfirst($titleFormKey),
'required' => true,
'onChange' => 'formatPermalink'
])

@if ($item->template ?? false)

@else

@formField('select', [
'name' => 'template',
'label' => 'Template',
'default' => \App\Models\Page::DEFAULT_TEMPLATE,
'options' => \App\Models\Page::AVAILABLE_TEMPLATES,
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