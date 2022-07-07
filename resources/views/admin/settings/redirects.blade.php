@extends('twill::layouts.settings')

@section('contentFields')

<label style="margin-top: 35px; display: block">Redirects</label>

@formField('color', [
'name' => 'secondary_codddlor_sdgagasdag',
'label' => 'Secondary'
])
@formField('repeater', ['type' => 'redirect_item'])

@stop