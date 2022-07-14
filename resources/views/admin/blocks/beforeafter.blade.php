@twillBlockTitle('Before & After')
@twillBlockIcon('website')

@include('admin.blocks.defaults.title', ['default' => 'Before & After'])

<label style="margin-top: 35px; display: block">Before & Afters</label>

@formField('repeater', ['type' => 'beforeafter_item'])

@include('admin.blocks.defaults.advanced')