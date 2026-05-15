@extends('layout')
@section('title', 'Home Page')
@section('content')
@vite(['resources/css/home.css'])

<!-- FEATURES -->
<section class="bg-gradient-to-b from-white to-gray-100 pt-40 pb-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="text-center">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 md:text-5xl">
                Explore novas experiências
            </h2>

            <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-600">
                Descubra conteúdos, participe de comunidades e compartilhe momentos com pessoas do mundo inteiro.
            </p>
        </div>

        <div class="mt-20 grid gap-8 md:grid-cols-2 lg:grid-cols-4">

            <div class="overflow-hidden rounded-3xl bg-white shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img
                    src="./images/audiroxo.jpeg"
                    class="h-56 w-full object-cover"
                    alt="">

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Compartilhe imagens
                    </h3>

                    <p class="mt-3 text-gray-600">
                        Poste momentos, artes, memes e ideias em uma plataforma moderna e intuitiva.
                    </p>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img
                    src="./images/lagoaboa.jpeg"
                    class="h-56 w-full object-cover"
                    alt="">

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Descubra comunidades
                    </h3>

                    <p class="mt-3 text-gray-600">
                        Encontre pessoas com os mesmos interesses e participe de discussões relevantes.
                    </p>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img
                    src="./images/praiafortal.jpeg"
                    class="h-56 w-full object-cover"
                    alt="">

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Converse em tempo real
                    </h3>

                    <p class="mt-3 text-gray-600">
                        Interaja com usuários, deixe comentários e acompanhe tendências diariamente.
                    </p>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img
                    src="./images/estudar.jpeg"
                    class="h-56 w-full object-cover"
                    alt="">

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Explore tendências
                    </h3>

                    <p class="mt-3 text-gray-600">
                        Veja o que está em alta e descubra conteúdos populares em diferentes comunidades.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="bg-white py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="text-center">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 md:text-5xl">
                Explore conteúdos diversos
            </h2>

            <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-600">
                Descubra imagens, comunidades e momentos compartilhados por pessoas do mundo inteiro.
            </p>
        </div>

        <div class="mt-20 grid gap-6">

            <div class="overflow-hidden rounded-[2rem] shadow-2xl">
                <img
                    class="h-[500px] w-full object-cover transition duration-500 hover:scale-[1.03]"
                    src="./images/img6.jpeg"
                    alt=""
                >
            </div>

            <div class="grid grid-cols-2 gap-4 md:grid-cols-5">

                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        class="h-40 w-full object-cover transition duration-300 hover:scale-110"
                        src="./images/img1.jpeg"
                        alt=""
                    >
                </div>

                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        class="h-40 w-full object-cover transition duration-300 hover:scale-110"
                        src="./images/enguia.jpeg"
                        alt=""
                    >
                </div>

                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        class="h-40 w-full object-cover transition duration-300 hover:scale-110"
                        src="./images/lagoaboa.jpeg"
                        alt=""
                    >
                </div>

                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        class="h-40 w-full object-cover transition duration-300 hover:scale-110"
                        src="./images/img4.jpeg"
                        alt=""
                    >
                </div>

                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        class="h-40 w-full object-cover transition duration-300 hover:scale-110"
                        src="./images/img3.jpeg"
                        alt=""
                    >
                </div>

            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-gradient-to-br from-yellow-100 via-orange-50 to-yellow-50 py-28">
    <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-[2rem] bg-white/70 shadow-2xl backdrop-blur-sm">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                    <div class="mx-auto max-w-xl text-center">

                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 md:text-5xl">
                            Faça parte da conversa!
                        </h2>

                        <p class="mt-6 text-lg text-gray-700">
                            Explore conteúdos, participe de conversas e descubra novas comunidades todos os dias. O SoupNet foi criado para quem gosta de compartilhar opiniões, acompanhar tendências e estar sempre conectado com o que importa.
                        </p>

                        <div class="mt-10 flex flex-wrap items-center justify-center gap-4">

                            <a
                                href="/signUp"
                                class="rounded-xl border border-yellow-500 bg-yellow-500 px-8 py-4 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-yellow-400 hover:shadow-2xl">
                                Junte-se
                            </a>

                            <a
                                href="/Browse"
                                class="rounded-xl border border-yellow-500 bg-white px-8 py-4 text-sm font-semibold text-yellow-700 transition duration-300 hover:-translate-y-1 hover:bg-yellow-50 hover:shadow-xl">
                                Explorar Posts
                            </a>

                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 p-4 md:grid-cols-1 lg:grid-cols-2">

                    <div class="overflow-hidden rounded-3xl shadow-xl">
                        <img
                            alt="Hudson"
                            src="./images/img2.jpeg"
                            class="h-40 w-full object-cover transition duration-500 hover:scale-105 sm:h-56 md:h-full">
                    </div>

                    <div class="overflow-hidden rounded-3xl shadow-xl">
                        <img
                            alt="Guizão"
                            src="./images/img5.jpeg"
                            class="h-40 w-full object-cover transition duration-500 hover:scale-105 sm:h-56 md:h-full">
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection