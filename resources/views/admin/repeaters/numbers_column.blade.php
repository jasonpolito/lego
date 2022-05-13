@twillRepeaterTitle('Column')
@twillRepeaterTitleField('title', ['hidePrefix' => true])
@twillRepeaterTrigger('Add column')

<div style="display: flex;">
    <div style="width: 6rem">
        @formField('input', [
        'name' => 'amount',
        'label' => 'Amount',
        'placeholder' => '10+'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 100%">

        @formField('input', [
        'name' => 'title',
        'label' => 'Title',
        'placeholder' => 'Years of experience'
        ])
    </div>
</div>

@formField('input', [
'type' => 'textarea',
'name' => 'text',
'label' => 'Content',
'placeholder' => 'Short blurb about numbers claim'
])