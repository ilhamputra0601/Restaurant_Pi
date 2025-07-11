@props(['td'=>'layout'])

@php
    $layout = [
        'action' => 'flex mt-5'
    ][$td] ?? 'px-4 py-3 text-left';
@endphp

<td class="{{ $layout}}">
    {{ $slot }}
</td>
