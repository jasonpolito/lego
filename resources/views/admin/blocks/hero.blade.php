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


@formField('medias', [
'name' => 'flexible',
'label' => 'Background Image',
])

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'fullscreen',
    'label' => 'Fill viewport',
    ])
</div>

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'is_narrow',
    'label' => 'Narrow (less vertical padding)',
    ])
</div>

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'video_background',
    'label' => 'Video background',
    ])
</div>

@formConnectedFields(['keepAlive' => true,
'fieldName' => 'video_background',
'fieldValues' => true,
'renderForBlocks' => true
])

<div style="margin-top: -26px">
    @formField('files', [
    'name' => 'bg_video',
    'note' => '',
    'label' => 'Video',
    ])
</div>

@endformConnectedFields

@include('admin.blocks.defaults.buttons')

@include('admin.blocks.defaults.block_id')