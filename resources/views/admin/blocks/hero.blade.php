@twillBlockTitle('Hero')
@twillBlockIcon('preview-desktop')

@include('admin.blocks.defaults.title')

@formField('wysiwyg', [
'name' => 'content',
'label' => 'Content',
'toolbarOptions' => config('cms.toolbar_options'),
'placeholder' => 'Almost before we knew it, we had left the ground.',
'editSource' => true,
])

@include('admin.blocks.defaults.buttons')

@formField('medias', [
'name' => 'flexible',
'label' => 'Background Image',
])

@php ob_start(); @endphp

@include('admin.blocks.defaults.align')

@formField('files', [
'name' => 'bg_video',
'note' => '',
'label' => 'Background video',
])

@php
$extra = ob_get_contents();
ob_end_clean();
@endphp

@include('admin.blocks.defaults.advanced', ['extra' => $extra])