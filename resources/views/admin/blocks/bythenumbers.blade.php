@twillBlockTitle('By The Numbers')
@twillBlockIcon('bythenumbers.png')

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