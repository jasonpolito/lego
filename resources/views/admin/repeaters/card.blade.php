@twillRepeaterTitle('Card')
@twillRepeaterTitleField('title_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add card')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'card'
    ])
</div>

<a17-tabs :tabs="[
    {name: 'content', label: 'Content'},
    {name: 'image', label: 'Image'},
    {name: 'buttons', label: 'Buttons'},
]">
    <div class="custom-tab custom-tab--image">
        <div style="margin-top: -24px">
            @formField('medias', [
            'name' => 'flexible',
            'label' => 'Card Image',
            ])
        </div>
    </div>
    <div class="custom-tab custom-tab--content">
        <div style="margin-top: -24px">

            @include('admin.blocks.defaults.title', ['defaults' => [
            'customize_title' => true,
            'title_text' => 'Card Title',
            'title_element' => 'h4',
            'title_display_element' => 'h4',
            ]])

            @formField('input', [
            'type' => 'textarea',
            'name' => 'card_content',
            'label' => 'Card Content',
            'placeholder' => 'Almost before we knew it, we had left the ground.',
            ])

            <div style="margin-top: -26px">
                @formField('checkbox', [
                'name' => 'link_card',
                'label' => 'Link card',
                'default' => true
                ])
            </div>

            @formConnectedFields(['keepAlive' => true,
            'fieldName' => 'link_card',
            'fieldValues' => true,
            'renderForBlocks' => true
            ])

            @include('admin.blocks.defaults.link')

            @endformConnectedFields
        </div>
    </div>
    <div class="custom-tab custom-tab--buttons">
        <div style="margin-top: -24px">
            @include('admin.blocks.defaults.buttons')
        </div>
    </div>
</a17-tabs>