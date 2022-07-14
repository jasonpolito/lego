@twillBlockTitle('By The Numbers')
@twillBlockIcon('more-dots')

<div style="margin-top: 35px">Columns</div>

<div style="display: none">
    @formField('input', [
    'name' => 'renderer',
    'label' => 'Renderer',
    'default' => 'render'
    ])
</div>

@formField('repeater', ['type' => 'numbers_column'])

@formField('medias', [
'name' => 'flexible',
'label' => 'Background Image',
])

@include('admin.blocks.defaults.advanced')