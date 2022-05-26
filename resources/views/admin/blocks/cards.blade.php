@twillBlockTitle('Cards')
@twillRepeaterTitleField('title_text', ['hidePrefix' => true])
@twillBlockIcon('cards.png')

@include('admin.blocks.defaults.title')

<label style="margin-top: 35px; display: block">Cards</label>

@formField('repeater', ['type' => 'card'])