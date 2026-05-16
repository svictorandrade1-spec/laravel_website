<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    <title>@yield('title')</title>

</head>

<body class="body-base">

    <header class="header-fixed">
        <div class="flex items-center gap-20">

            <div class="header-logo-wrapper">
                <img
                    src="https://media.istockphoto.com/id/1209262314/pt/vetorial/bowl-of-hot-soup-hand-drawn-doodle-icon-miso-soup-vector-sketch-illustration-cartoon.jpg?s=612x612&w=0&k=20&c=eFeugpUflQIVvES49u2M9C42wE3w1xtVJ-XwOfI0L-w="
                    class="header-logo-img"
                    alt="Soup icon">
            </div>

            <div class="flex items-center gap-11">
                <div class="aboutTitles"><a href="/">Início</a></div>
                <div class="aboutTitles"><a href="/about">Sobre</a></div>
                <div class="aboutTitles"><a href="/Browse">Navegar</a></div>
            </div>

        </div>

        @if (!session('name'))

        <div class="flex items-center gap-4">
            <a
                href="/SignIn"
                class="rounded-xl border border-yellow-300 bg-white px-5 py-2.5 text-sm font-semibold text-yellow-700 transition duration-200 hover:-translate-y-0.5 hover:border-yellow-400 hover:bg-yellow-50 hover:shadow-lg">
                Login
            </a>

            <a
                href="/signUp"
                class="rounded-xl bg-yellow-400 px-5 py-2.5 text-sm font-semibold text-white shadow-md transition duration-200 hover:-translate-y-0.5 hover:bg-yellow-500 hover:shadow-xl">
                Cadastro
            </a>
        </div>

        @endif

    </header>


    @yield('content')

    <footer class="bg-[#FFFDD0]">

        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

            <div class="lg:flex lg:items-end lg:justify-between">

                <div>

                    <div class="flex items-center gap-4">

                        <img
                            src="https://media.istockphoto.com/id/1209262314/pt/vetorial/bowl-of-hot-soup-hand-drawn-doodle-icon-miso-soup-vector-sketch-illustration-cartoon.jpg?s=612x612&w=0&k=20&c=eFeugpUflQIVvES49u2M9C42wE3w1xtVJ-XwOfI0L-w="
                            alt="SoupNet Logo"
                            class="h-14 w-14 rounded-full object-cover">

                        <h2 class="text-3xl font-bold text-[darkslategrey]">
                            SoupNet
                        </h2>

                    </div>

                    <p class="mt-6 max-w-md text-gray-600">
                        Plataforma desenvolvida para compartilhar experiências através de uma experiência simples,
                        moderna e intuitiva.
                    </p>

                </div>

                <ul class="mt-12 flex flex-col gap-3 lg:mt-0">

                    <li>
                        <a class="text-lg font-medium text-gray-700 transition hover:text-teal-600" href="/">
                            Início
                        </a>
                    </li>

                    <li>
                        <a class="text-lg font-medium text-gray-700 transition hover:text-teal-600" href="/about">
                            Sobre
                        </a>
                    </li>

                    <li>
                        <a class="text-lg font-medium text-gray-700 transition hover:text-teal-600" href="/browse">
                            Navegar
                        </a>
                    </li>


                    </li>

                </ul>

            </div>

            <p class="mt-12 text-sm text-gray-600">
                © 2026 SoupNet. All rights reserved.
            </p>

        </div>

    </footer>
    </footer>

</body>