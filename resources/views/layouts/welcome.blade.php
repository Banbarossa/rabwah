<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth light">
<head>

    @include('partials.welcome-head')
    @include('partials.open-graph')
    <meta name="description"
          content="{{ $metaDescription ?? 'Pesantren Ar-Rabwah, program unggulan Tahfidz Al-Qur\'an dan Bahasa Arab di lingkungan perbukitan yang asri dan alami.' }}">
    <meta name="keywords" content="{{$keywords??'Ar Rabwah'}}">
    <meta name="author" content="Ar Rabwah">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
</head>
<body class="text-gray-800 antialiased bg-primary">
<livewire:layouts.navbar/>
{{ $slot }}
<livewire:layouts.footer/>
{{--<x-dark-switcher/>--}}


@fluxScripts

</body>
</html>
