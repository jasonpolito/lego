@twillRepeaterTitle('Link')
@twillRepeaterTitleField('text', ['hidePrefix' => true])
@twillRepeaterTrigger('Add link')

@php
use App\Models\Partial;
$partials = Partial::all()->pluck('title', 'id');
@endphp

<div style="display: none">
    @formField('input', [
    'name' => 'child_type',
    'label' => 'type',
    'default' => 'link_item'
    ])
</div>

@if (env('STACK_VERSION') < 1) @formField('input', [ 'name'=> 'text',
    'label' => 'Text',
    'placeholder' => 'Link Text'
    ])

    <div style="margin-top: -26px">
        @formField('checkbox', [
        'name' => 'is_title',
        'label' => 'Is subtitle',
        ])
    </div>
    @endif

    @if (env('STACK_VERSION') < 1) @formConnectedFields(['keepAlive'=> true,
        'fieldName' => 'is_title',
        'fieldValues' => false,
        'renderForBlocks' => true
        ])
        @endif

        @include('admin.blocks.defaults.link')
        @if (env('STACK_VERSION') >= 1)
        <div style="margin-top: -26px">
            @formField('checkbox', [
            'name' => 'has_submenu',
            'label' => 'Has submenu',
            ])
        </div>

        @formConnectedFields(['keepAlive' => true,
        'fieldName' => 'has_submenu',
        'fieldValues' => true,
        'renderForBlocks' => true
        ])
        @include('admin.blocks.defaults.links')

        @endformConnectedFields
        @else
        <div style="margin-top: -26px">
            @formField('checkbox', [
            'name' => 'has_submenu',
            'label' => 'Has submenu',
            ])
        </div>
        <div style="margin-top: -26px">
            @formField('checkbox', [
            'name' => 'has_megamenu',
            'label' => 'Has megamenu',
            ])
        </div>

        @endformConnectedFields


        @formConnectedFields(['keepAlive' => true,
        'fieldName' => 'has_submenu',
        'fieldValues' => true,
        'renderForBlocks' => true
        ])

        @include('admin.blocks.defaults.links')

        @endformConnectedFields

        @formConnectedFields(['keepAlive' => true,
        'fieldName' => 'has_megamenu',
        'fieldValues' => true,
        'renderForBlocks' => true
        ])


        @formField('select', [
        'name' => 'partial',
        'label' => 'Partial',
        'options' => $partials
        ])
        @endformConnectedFields @endif