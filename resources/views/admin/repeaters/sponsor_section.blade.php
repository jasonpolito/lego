@twillRepeaterTitle('Sponsor Section')
@twillRepeaterTitleField('title_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add sponsor section')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'sponsor_section'
    ])
</div>

@include('admin.blocks.defaults.title')

@formField('repeater', ['type' => 'sponsor_item'])