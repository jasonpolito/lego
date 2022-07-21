@twillRepeaterTitle('Social Link')
@twillRepeaterTitleField('icon', ['hidePrefix' => true])
@twillRepeaterTrigger('Add social link')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'social_item'
    ])
</div>

<div style="display: flex">
    <div style="width: 25%">

        @formField('select', [
        'name' => 'icon',
        'label' => 'Icon',
        'placeholder' => 'Select icon',
        'options' => [
        [
        'label' => 'Facebook',
        'value' => 'Facebook',
        ],
        [
        'label' => 'Instagram',
        'value' => 'Instagram',
        ],
        [
        'label' => 'Twitter',
        'value' => 'Twitter',
        ],
        [
        'label' => 'LinkedIn',
        'value' => 'LinkedIn',
        ],
        [
        'label' => 'YouTube',
        'value' => 'YouTube',
        ],
        ]
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 75%">
        @formField('input', [
        'name' => 'url',
        'label' => 'URL',
        'placeholder' => 'https://facebook.com/company-url'
        ])
    </div>
</div>