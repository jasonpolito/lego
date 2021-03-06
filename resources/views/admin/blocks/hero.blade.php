@twillBlockTitle('Hero')
@twillBlockIcon('preview-desktop')

<div style="height: 18px"></div>
<a17-tabs :tabs="[
    {name: 'content', label: 'Content'},
    {name: 'buttons', label: 'Buttons'},
    {name: 'style', label: 'Style'},
]">
    <div class="custom-tab custom-tab--content">
        <div style="margin-top: -24px">
            @include('admin.blocks.defaults.title')

            @formField('wysiwyg', [
            'name' => 'content',
            'label' => 'Content',
            'toolbarOptions' => config('cms.toolbar_options'),
            'placeholder' => 'Almost before we knew it, we had left the ground.',
            'editSource' => true,
            ])
        </div>
    </div>

    <div class="custom-tab custom-tab--buttons">
        <div style="margin-top: -24px">
            @include('admin.blocks.defaults.buttons')
        </div>
    </div>

    <div class="custom-tab custom-tab--style">
        <div style="margin-top: -24px">

            @formField('select', [
            'name' => 'variant',
            'default' => 'default',
            'label' => 'Variant',
            'options' => [
            [
            'label' => 'Default',
            'value' => 'default',
            ],
            [
            'label' => 'Contained',
            'value' => 'contained',
            ],
            [
            'label' => 'Action Box',
            'value' => 'thin',
            ],
            ]
            ])
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
            <div style="margin-top: -26px">
                @formField('checkbox', [
                'name' => 'use_main_image',
                'label' => 'Use main image'
                ])
            </div>


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

            <div style="margin-top: -26px">
                @formField('checkbox', [
                'name' => 'parallax_background',
                'label' => 'Parallax background'
                ])
            </div>

            @include('admin.blocks.defaults.align')


            <div style="display: flex">
                <div style="width: 50%">
                    @formField('select', [
                    'name' => 'overlay_opacity',
                    'label' => 'Overlay Opactiy',
                    'default' => '75',
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

        </div>
    </div>
</a17-tabs>



@php ob_start(); @endphp

@php
$extra = ob_get_contents();
ob_end_clean();
@endphp

@include('admin.blocks.defaults.advanced', ['extra' => $extra])