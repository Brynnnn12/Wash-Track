@props(['active' => false])

@php
    $classes = $active
        ? 'bg-blue-500 text-white font-bold ' . ($attributes->get('class') ?? '')
        : $attributes->get('class') ?? '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
