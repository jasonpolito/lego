@php
$no_section = $no_section ?? false;
@endphp
<div style="margin: 24px 0 -24px; border-top: solid 1px #eee">
</div>

@formField('checkbox', [
'name' => 'show_advanced_options',
'default' => false,
'label' => 'Advanced options'
])

@formConnectedFields([
'keepAlive' => true,
'fieldName' => 'show_advanced_options',
'fieldValues' => true,
'renderForBlocks' => true
])


<a17-tabs :tabs="[
        { name: 'style', label: 'Appearance' },
        { name: 'utils', label: 'Utilities' },
    ]">
    <div class="custom-tab custom-tab--style">
        <div style="margin-top: -24px">

            @if (isset($extra))
            {!! $extra !!}
            @endif

            @if (!$no_section)
            @include('admin.blocks.defaults.section')
            @endif

        </div>
    </div>

    <div class="custom-tab custom-tab--utils">
        <div>// UNDER DEVELOPMENT</div>
    </div>

</a17-tabs>

@include('admin.blocks.defaults.block_id')

@include('admin.blocks.defaults.render')


@endformConnectedFields