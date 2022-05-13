@php
use App\Models\Partial;
$partials = Partial::all()->pluck('title', 'id');
@endphp

@twillBlockTitle('Partial')
@twillBlockIcon('website')

@formField('select', [
'name' => 'partial',
'label' => 'Partial',
'options' => $partials
])
