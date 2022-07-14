@twillBlockTitle('Gallery')
@twillBlockIcon('flex-grid')

@include('admin.blocks.defaults.title')

@formField('medias', [
'name' => 'flexible',
'label' => 'Gallery Images',
'max' => 99
])

@include('admin.blocks.defaults.advanced')