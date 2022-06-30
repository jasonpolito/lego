@twillBlockTitle('FAQs')
@twillBlockIcon('editor')

@include('admin.blocks.defaults.title')

<label style="margin-top: 35px; display: block">FAQs</label>

@formField('repeater', ['type' => 'faq_item'])


@formField('input', [
'name' => 'section_id',
'label' => 'Section ID',
])