@php
$url = env('APP_URL');
@endphp
@twillRepeaterTitle('Redirects')
@twillRepeaterTitleField('origin', ['hidePrefix' => true])
@twillRepeaterTrigger('Add redirect')

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'redirect_item'
    ])
</div>

<div style="display: flex; align-items: center; margin-top: -24px">
    <div style="width: 50%">
        @formField('input', [
        'name' => 'origin',
        'label' => 'Original',
        'placeholder' => '/redirect-origin'
        ])
    </div>
    <div style="width: 1rem"></div>
    <div style="width: 50%">
        @formField('input', [
        'name' => 'destination',
        'label' => 'Destination',
        'placeholder' => '/redirect-destination'
        ])
    </div>
</div>