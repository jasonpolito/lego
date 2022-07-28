@twillBlockTitle('Cards')
@twillBlockIcon('fix-grid')

<label style="margin-top: 35px; display: block">Card Sections</label>

@formField('repeater', ['type' => 'card_section'])

@include('admin.blocks.defaults.render')

{{-- 
@php ob_start(); @endphp

<div style="display: flex">
    <div style="width: 100%">
        @formField('select', [
        'name' => 'style',
        'label' => 'Style',
        'default' => 'default',
        'options' => [
        [ 'label' => 'Default', 'value' => 'default' ],
        ]])
    </div>
</div>

@php
$extra = ob_get_contents();
ob_end_clean();
@endphp --}}

@include('admin.blocks.defaults.advanced')