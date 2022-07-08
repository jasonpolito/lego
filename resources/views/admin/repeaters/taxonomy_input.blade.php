@twillRepeaterTitle('Input')
@twillRepeaterTitleField('name', ['hidePrefix' => true])
@twillRepeaterTrigger('Add input')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'taxonomy_input'
    ])
</div>

<div style="display: flex; align-items: center; margin-top: -24px">
    <div style="width: 50%">
        @formField('input', [
        'name' => 'name',
        'placeholder' => 'Service title',
        'label' => 'Name'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('select', [
        'name' => 'type',
        'label' => 'Input type',
        'default' => 'text',
        'options' => [
        [
        'label' => 'Short text',
        'value' => 'text'
        ],
        [
        'label' => 'Long text',
        'value' => 'textarea'
        ],
        ]
        ])
    </div>
</div>