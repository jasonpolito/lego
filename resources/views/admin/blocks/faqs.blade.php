@twillBlockTitle('Accordion')
@twillBlockIcon('editor')

@include('admin.blocks.defaults.title')

<label style="margin-top: 35px; display: block">Accordion Items</label>

@formField('repeater', ['type' => 'faq_item'])

@include('admin.blocks.defaults.advanced')