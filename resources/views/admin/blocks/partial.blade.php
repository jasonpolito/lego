@twillBlockTitle('Partial')
@twillBlockIcon('replace')

@php
use App\Models\Partial;
$partials = Partial::all()->pluck('title', 'id');
@endphp

@formField('select', [
'name' => 'partial',
'label' => 'Partial',
'options' => $partials
])

@include('admin.blocks.defaults.advanced')