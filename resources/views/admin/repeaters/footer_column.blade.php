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

@include('admin.blocks.defaults.links')
@include('admin.blocks.defaults.buttons')