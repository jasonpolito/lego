@php
ob_start();
@endphp
{!! $system_repo::generateColorVarsCSS() !!}
{!! $system_repo::generateColorClassesCSS() !!}
{!! $system_repo::generateColorStateClassesCSS() !!}

@php
$css = ob_get_contents();
ob_end_clean();
$css = preg_replace(
array('/\s*(\w)\s*{\s*/','/\s*(\S*:)(\s*)([^;]*)(\s|\n)*;(\n|\s)*/','/\n/','/\s*}\s*/'),
array('$1{ ','$1$3;',"",'} '),
$css
);
@endphp

{!! $css !!}