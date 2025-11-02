@props(['href'=>'#','active'=>false])


@php
    $classes = $active
        ? 'inline-block px-4 py-2 text-brand-green border-b-3 border-brand-green font-bold rounded-t-lg active dark:text-blue-500 dark:border-blue-500'
        : 'inline-block px-4 py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
