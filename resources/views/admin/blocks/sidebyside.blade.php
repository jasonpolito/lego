@twillBlockTitle('Side By Side')
@twillBlockIcon('image-text')
@twillBlockGroup('another')

@include('admin.blocks.defaults.align')

@include('admin.blocks.defaults.title')

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('cms.toolbar_options'),
'placeholder' => 'Almost before we knew it, we had left the ground.',
'editSource' => true,
])

@formField('medias', [
'name' => 'flexible',
'label' => 'Image',
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'link_image',
    'label' => 'Link image',
    ])
</div>

@formConnectedFields(['keepAlive' => true,
'fieldName' => 'link_image',
'fieldValues' => true,
'renderForBlocks' => true
])

@formField('input', [
'name' => 'img_url',
'label' => 'Link URL',
'placeholder' => 'https://google.com'
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'img_external',
    'label' => 'Open in new tab',
    ])
</div>

@endformConnectedFields

@include('admin.blocks.defaults.checklist')

@include('admin.blocks.defaults.buttons')

@include('admin.blocks.defaults.block_id')