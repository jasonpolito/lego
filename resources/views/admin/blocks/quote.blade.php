@twillBlockTitle('Quote')
@twillBlockIcon('quote')

@formField('input', [
'name' => 'name',
'label' => 'Name',
'placeholder' => 'John Doe'
])

@formField('input', [
'name' => 'title',
'label' => 'Title',
'placeholder' => 'Head Indian'
])

@formField('input', [
'name' => 'content',
'label' => 'Quote',
'type' => 'textarea',
'placeholder' => 'To be or not to be...'
])

@formField('medias', [
'name' => 'square',
'label' => 'Photo',
])


@formField('input', [
'name' => 'cta_text',
'label' => 'CTA Text',
'placeholder' => 'Learn More'
])

@formField('input', [
'name' => 'cta_url',
'label' => 'CTA URL',
'placeholder' => '#'
])

@include('admin.blocks.defaults.advanced')