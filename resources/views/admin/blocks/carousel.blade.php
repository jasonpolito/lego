@twillBlockTitle('Carousel')
@twillBlockIcon('text_content.png')

@include('admin.components.title', ['text' => 'Carousel items'])

@formField('repeater', [
'type' => 'carousel_item'
])