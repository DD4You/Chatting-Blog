<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('dd4you/dpanel/js/cute-alert/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')

</head>

<body class="bg-gray-100">
    <nav class="px-6 md:px-24 py-1 bg-white flex flex-wrap justify-between">
        <a href="/" class="text-red-400 font-bold">
            <img class="w-10 h-10 rounded-full" src="{{ asset('favicon.ico') }}" alt="">
        </a>
        <div class="flex w-full md:w-auto gap-8 items-center">
            <a href="{{ route('landingPage') }}" class="hidden md:block">Home</a>
            <form action="{{ route('landingPage') }}" method="GET"
                class="bg-white shadow rounded-md w-full md:w-auto flex justify-between px-1">
                <input type="search" name="search" class="bg-transparent focus:outline-none text-sm pr-8 py-1"
                    value="{{ request()->search }}" required placeholder="Search what you want...">
                <button><i class='bx bx-search text-gray-500'></i></button>
            </form>
        </div>
    </nav>
    <main class="px-6 md:px-24 mt-8 mb-3 min-h-[calc(100vh-6.5rem)]">

        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">

            {{-- Left Side --}}
            <div class="md:col-span-4 ">
                @yield('body_content')
            </div>

            {{-- Right Side --}}
            <div class="md:col-span-2 ">
                <x-heading-card title="Category" />
                <x-category-card />

                <x-heading-card title="Latest Post" />

                <x-latest-post />

                {{-- <x-heading-card title="Newsletter" />
                <x-news-letter /> --}}
            </div>
        </div>

    </main>
    <footer>
        <div class="px-6 bg-gray-900 rounded text-white md:mx-24 py-2 grid grid-cols-1 mb-3 md:grid-cols-3 gap-6">
            <div class="flex gap-6">
                <img class="w-16 h-16 rounded-full" src="{{ asset('favicon.ico') }}" alt="">
                <small class="text-gray-300">
                    Welcome to our website! Our goal is to provide you
                    with practical tips and advice that you can use to impress the girl of your dreams through
                    chatting
                </small>
            </div>
            <div class="flex flex-col">
                <a href="{{ route('legal-stuff', 'about-us') }}">About Us</a>
                <a href="{{ route('legal-stuff', 'privacy-policy') }}">Privacy Policy</a>
                <a href="{{ route('legal-stuff', 'terms-of-use') }}">Terms Of Condition</a>
            </div>

            <div class="flex flex-col">
                <a href="{{ route('legal-stuff', 'disclaimer') }}">Disclaimer</a>
                <a href="{{ route('legal-stuff', 'contact-us') }}">Contact Us</a>
            </div>
        </div>
        <div class="px-4 md:px-24 bg-gray-800 text-white flex flex-wrap justify-center md:justify-between">
            <span class="text-center">&copy; {{ config('app.name') . ' ' . date('Y') }} | All Rights Reserved.</span>
            <p>Design and Developed By <a href="https://dd4you.in" class="underline">DD4You.in</a></p>
        </div>
    </footer>

    <script src="{{ asset('dd4you/dpanel/js/dd4you.js') }}"></script>
    <script src="{{ asset('dd4you/dpanel/js/cute-alert/cute-alert.js') }}"></script>
    @stack('scripts')
    <script>
        @if (Session::has('success'))
            cuteToast({
                type: "success",
                message: "{{ session('success') }}",
            })
        @endif

        @if (Session::has('error'))
            cuteToast({
                type: "error",
                message: "{{ session('error') }}",
            })
        @endif

        @if (Session::has('info'))
            cuteToast({
                type: "info",
                message: "{{ session('info') }}",
            })
        @endif

        @if (Session::has('warning'))
            cuteToast({
                type: "warning",
                message: "{{ session('warning') }}",
            })
        @endif
    </script>
</body>

</html>
