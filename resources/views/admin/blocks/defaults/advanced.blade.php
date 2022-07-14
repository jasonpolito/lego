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

<div style="margin-top: -24px">

    @if (isset($extra))
    {!! $extra !!}
    @endif

    @if (!$no_section)
    @include('admin.blocks.defaults.section')
    @endif

    @include('admin.blocks.defaults.block_id')

    @include('admin.blocks.defaults.render')

</div>

@endformConnectedFields