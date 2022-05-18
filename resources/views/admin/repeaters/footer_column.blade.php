@twillRepeaterTitle('Column')
@twillRepeaterTitleField('title', ['hidePrefix' => true])
@twillRepeaterTrigger('Add column')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'footer_column'
    ])
</div>

@formField('input', [
'name' => 'title',
'label' => 'Title',
'placeholder' => 'Years of experience'
])

@include('admin.components.title', ['text' => 'Links'])
@formField('repeater', ['type' => 'link_item'])