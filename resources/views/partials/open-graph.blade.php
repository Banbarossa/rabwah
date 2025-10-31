    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $title ?? 'Pesantren Islam Ar-Rabwah' }}">
    <meta property="og:description" content="{{ $description ?? 'Pesantren Ar-Rabwah adalah lembaga pendidikan Islam yang berfokus pendidikan Al-Qur’an, ilmu agama, dan ilmu umum dengan pendekatan karakter, dan kemandirian' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $image ?? asset('logo.png') }}">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card (optional) --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Pesantren Islam Ar-Rabwah' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Pesantren Ar-Rabwah adalah lembaga pendidikan Islam yang berfokus pendidikan Al-Qur’an, ilmu agama, dan ilmu umum dengan pendekatan karakter, dan kemandirian' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('logo.png') }}">
