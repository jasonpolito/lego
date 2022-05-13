@twillBlockTitle('Cards')
@twillBlockIcon('cards.png')

@include('admin.blocks.defaults.title')

<label style="margin-top: 35px; display: block">Cards</label>

@formField('repeater', ['type' => 'card'])