@twillBlockTitle('Hero')
@twillBlockIcon('star-feature_active')

@include('admin.blocks.defaults.align')

@include('admin.blocks.defaults.title')


@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('cms.toolbar_options'),
'placeholder' => 'Almost before we knew it, we had left the ground.',
'editSource' => true,
])

@formConnectedFields([
'fieldName' => 'video_background',
'fieldValues' => false,
'renderForBlocks' => true
])
@formField('medias', [
'name' => 'flexible',
'label' => 'Background Image',
])
@endformConnectedFields

@formConnectedFields([
'fieldName' => 'video_background',
'fieldValues' => true,
'renderForBlocks' => true
])
<div style="margin-bottom: 52px">
    @formField('input', [
    'name' => 'video_background_url',
    'label' => 'Video background url',
    ])
</div>
@endformConnectedFields

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'video_background',
    'label' => 'Video background',
    ])
</div>

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'fullscreen',
    'label' => 'Fill viewport',
    ])
</div>

@include('admin.blocks.defaults.buttons')

@include('admin.blocks.defaults.block_id')