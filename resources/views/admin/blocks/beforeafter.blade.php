@twillBlockTitle('Before & After')
@twillBlockIcon('faqs.png')

@include('admin.blocks.defaults.title', ['default' => 'Before & After'])

<label style="margin-top: 35px; display: block">Before & Afters</label>

@formField('repeater', ['type' => 'beforeafter_item'])

@formField('input', [
'name' => 'section_id',
'label' => 'Section ID',
])