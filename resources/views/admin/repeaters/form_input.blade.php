@twillRepeaterTitle('Input')
@twillRepeaterTitleField('name', ['hidePrefix' => true])
@twillRepeaterTrigger('Add input')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'form_input'
    ])
</div>

<div style="display: flex; align-items: center; margin-top: -24px">
    <div style="width: 50%">
        @formField('input', [
        'name' => 'name',
        'placeholder' => 'Full name',
        'label' => 'Name'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('input', [
        'name' => 'placeholder',
        'placeholder' => 'John Doe',
        'label' => 'Placeholder'
        ])
    </div>
</div>

<div style="margin-top: -26px">
    @formField('checkbox', [
    'name' => 'required',
    'label' => 'Required',
    'default' => false
    ])
</div>


<div style="display: flex;">
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
        [
        'label' => 'Options',
        'value' => 'options'
        ]
        ]
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formConnectedFields(['keepAlive' => true,
        'fieldName' => 'type',
        'fieldValues' => 'options',
        'renderForBlocks' => true
        ])
        @formField('select', [
        'name' => 'options_type',
        'label' => 'Options type',
        'default' => 'select',
        'options' => [
        [
        'label' => 'Select Box',
        'value' => 'select'
        ],
        [
        'label' => 'List',
        'value' => 'checkbox'
        ]
        ]
        ])
        <div style="margin-top: -26px">
            @formField('checkbox', [
            'name' => 'allow_multiple',
            'label' => 'Allow multiple',
            'default' => false
            ])
        </div>
        @formField('repeater', ['type' => 'select_option'])

        @endformConnectedFields

        @formConnectedFields(['keepAlive' => true,
        'fieldName' => 'type',
        'fieldValues' => 'text',
        'renderForBlocks' => true
        ])

        @formField('select', [
        'name' => 'text_type',
        'label' => 'Text type',
        'default' => 'text',
        'options' => [
        [
        'label' => 'Basic',
        'value' => 'text'
        ],
        [
        'label' => 'Email',
        'value' => 'email'
        ],
        [
        'label' => 'Phone',
        'value' => 'tel'
        ],
        [
        'label' => 'Date',
        'value' => 'date'
        ],
        [
        'label' => 'Number',
        'value' => 'number'
        ]
        ]
        ])
        @endformConnectedFields

    </div>
</div>