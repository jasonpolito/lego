@formField('checkbox', [
'name' => 'btn_show',
'label' => 'Show Button(s)',
])

@formConnectedFields([
'fieldName' => 'btn_show',
'fieldValues' => true,
'renderForBlocks' => true
])

<div style="margin-top: 35px">Buttons</div>

@formField('repeater', ['type' => 'button'])

@endformConnectedFields