@twillBlockTitle('Footer')
@twillBlockIcon('website')

@formField('medias', [
'name' => 'flexible',
'label' => 'Logo',
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'customize_logo',
    'label' => 'Customize logo style',
    ])
</div>

@formConnectedFields([
'fieldName' => 'customize_logo',
'fieldValues' => true,
'renderForBlocks' => true
])

@formField('input', [
'type' => 'textarea',
'name' => 'logo_style',
'label' => 'Logo CSS',
])

@endformConnectedFields

@formField('wysiwyg', [
'name' => 'footer_copy',
'label' => 'Footer Copy',
'toolbarOptions' => config('cms.toolbar_options'),
'placeholder' => 'Basic information goes here'
])

@include('admin.components.title', ['text' => 'Columns'])
@formField('repeater', ['type' => 'footer_column'])

@formField('wysiwyg', [
'name' => 'legal_copy',
'label' => 'Legal Copy',
'placeholder' => 'Copyright © 2022'
])

@include('admin.components.title', ['text' => 'Legal Links'])
@formField('repeater', ['type' => 'link_item'])