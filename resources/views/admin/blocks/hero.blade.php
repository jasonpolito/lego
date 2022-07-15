@twillBlockTitle('Hero')
@twillBlockIcon('preview-desktop')

@include('admin.blocks.defaults.title')

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('cms.toolbar_options'),
'placeholder' => 'Almost before we knew it, we had left the ground.',
'editSource' => true,
])

@include('admin.blocks.defaults.buttons')

@formConnectedFields([
'keepAlive' => true,
'fieldName' => 'video_background',
'fieldValues' => false,
'renderForBlocks' => true,
])

@formField('medias', [
'name' => 'flexible',
'label' => 'Background Image',
])

@endformConnectedFields

@formConnectedFields([
'keepAlive' => true,
'fieldName' => 'video_background',
'fieldValues' => true,
'renderForBlocks' => true
])

@formField('files', [
'name' => 'bg_video',
'note' => '',
'label' => 'Background video',
])

@endformConnectedFields

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'video_background',
    'label' => 'Video background'
    ])
</div>

@include('admin.blocks.defaults.align')

@php ob_start(); @endphp

<div style="display: flex">
    <div style="width: 50%">
        @formField('select', [
        'name' => 'overlay_opacity',
        'label' => 'Overlay Opactiy',
        'default' => '50',
        'options' => [
        [ 'label' => '0%', 'value' => '0' ],
        [ 'label' => '5%', 'value' => '5' ],
        [ 'label' => '10%', 'value' => '10' ],
        [ 'label' => '20%', 'value' => '20' ],
        [ 'label' => '25%', 'value' => '25' ],
        [ 'label' => '30%', 'value' => '30' ],
        [ 'label' => '40%', 'value' => '40' ],
        [ 'label' => '50%', 'value' => '50' ],
        [ 'label' => '60%', 'value' => '60' ],
        [ 'label' => '70%', 'value' => '70' ],
        [ 'label' => '75%','value' => '75'],
        [ 'label' => '80%', 'value' => '80' ],
        [ 'label' => '90%', 'value' => '90' ],
        [ 'label' => '95%', 'value' => '95' ],
        [ 'label' => '100%', 'value' => '100' ],
        ]
        ])

    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('color', [
        'label' => 'Overlay Color',
        'name' => 'overlay_color',
        'default' => false
        ])
    </div>
</div>

@php
$extra = ob_get_contents();
ob_end_clean();
@endphp

@include('admin.blocks.defaults.advanced', ['extra' => $extra])