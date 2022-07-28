@twillRepeaterTitle('Field')
@twillRepeaterTitleField('name', ['hidePrefix' => true])
@twillRepeaterTrigger('Add field')

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
        'placeholder' => 'Field name (ex: Service Title)',
        'label' => 'Name'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('select', [
        'name' => 'type',
        'label' => 'Type',
        'searchable' => true,
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
        [
        'label' => 'Checkbox',
        'value' => 'checkbox'
        ],
        [
        'label' => 'Date',
        'value' => 'date'
        ],
        ]
        ])
    </div>
</div>