@twillRepeaterTitle('Column')
@twillRepeaterTitleField('title', ['hidePrefix' => true])
@twillRepeaterTrigger('Add column')


@formField('input', [
'name' => 'amount',
'label' => 'Amount',
'placeholder' => '10+'
])

@formField('input', [
'name' => 'title',
'label' => 'Title',
'placeholder' => 'Years of experience'
])

@formField('input', [
'type' => 'textarea',
'name' => 'text',
'label' => 'Content',
'placeholder' => 'Short blurb about numbers claim'
])