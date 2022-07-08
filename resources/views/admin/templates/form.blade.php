@extends('twill::layouts.form', [
'disableContentFieldset' => true
])


@section('fieldsets')

@formFieldset(['id' => 'page_content', 'title' => 'Blocks', 'open' => true])

@formField('block_editor', [
'blocks' => config('cms.blocks.default')
])

@endformFieldset
@endsection