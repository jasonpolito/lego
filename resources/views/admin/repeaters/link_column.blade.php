@twillBlockTitle('Link Column')
@twillBlockIcon('expand')
@twillRepeaterTitleField('title_text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add column')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'link_column'
    ])
</div>

@include('admin.blocks.defaults.title')

@include('admin.blocks.defaults.links')