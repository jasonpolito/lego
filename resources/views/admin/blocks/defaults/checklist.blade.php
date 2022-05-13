@formField('checkbox', [
'name' => 'checklist_show',
'label' => 'Show checklist',
])

@formConnectedFields([
'fieldName' => 'checklist_show',
'fieldValues' => true,
'renderForBlocks' => true
])

<div style="margin-top: 35px">Checklist items</div>

@formField('repeater', ['type' => 'checklist_item'])

@endformConnectedFields