@twillBlockTitle('Image')
@twillBlockIcon('image')

@formConnectedFields(['keepAlive'=> true,
'fieldName' => 'use_url',
'fieldValues' => false,
'renderForBlocks' => true
])
@formField('medias', [
'name' => 'flexible',
'label' => 'Image',
'default' => ' '
])
@endformConnectedFields

@formConnectedFields(['keepAlive'=> true,
'fieldName' => 'use_url',
'fieldValues' => true,
'renderForBlocks' => true
])
@formField('input', [
'name' => 'url',
'label' => 'Image URL',
'placeholder' => env('APP_URL') . "/img/filename.jpg"
])
@endformConnectedFields

<div style="margin-top: -24px;">
    @formField('checkbox', [
    'name' => 'use_url',
    'default' => false,
    'label' => 'URL'
    ])
</div>


@include('admin.blocks.defaults.advanced', ['no_section' => true])