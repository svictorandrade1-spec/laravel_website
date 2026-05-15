@extends('layout')

@section('title', 'About Page')

@section('content')

<div class="about-page">

      <section class="mt-16 bg-[#FFF6CC] py-20 shadow-sm rounded-2xl">

            <div class="mx-auto max-w-7xl px-6">

                  <div class="grid grid-cols-1 items-center gap-12 md:grid-cols-4">

                        <div class="md:col-span-3">

                              <img
                                    src="./images/viaduto.jpeg"
                                    class="rounded-3xl shadow-lg"
                                    alt="Sobre a SoupNet">

                        </div>

                        <div class="md:col-span-1">

                              <div class="max-w-prose">

                                    <h2 class="text-3xl font-bold text-gray-800">
                                          Sobre a SoupNet
                                    </h2>

                                    <p class="mt-5 text-lg leading-relaxed text-gray-700">
                                          A SoupNet é uma plataforma de compartilhamento de experiências, onde os usuários podem postar e acessar conteúdo de diferentes áreas de interesse. Nosso objetivo é criar um espaço onde as pessoas possam se conectar, compartilhar suas histórias e descobrir novas perspectivas. Seja para compartilhar uma receita deliciosa, uma experiência de viagem ou um pensamento inspirador, a SoupNet é o lugar perfeito para expressar sua criatividade e se conectar com outros entusiastas.
                                    </p>

                              </div>

                        </div>

                  </div>

            </div>

      </section>


      <section class="pt-20 pb-10 text-center">

            <h2 class="text-4xl font-bold text-gray-800">
                  Conheça os Desenvolvedores
            </h2>

            <p class="mt-4 text-lg text-gray-600">
                  O time responsável por criar a SoupNet é composto por dois membros dedicados, cada um trazendo suas habilidades únicas para o projeto.
            </p>

      </section>


      <div class="mx-auto grid w-full max-w-[1200px] grid-cols-1 gap-25 px-16 pb-24 md:grid-cols-2">
            <div class="group relative h-[600px] overflow-hidden rounded-xl bg-black shadow-xl">

                  <img
                        alt=""
                        src="{{ asset('images/eu.png') }}"
                        class="absolute inset-0 h-full w-full object-fill opacity-75 transition-opacity duration-300 group-hover:opacity-50">

                  <div class="relative flex h-full flex-col justify-end p-6">

                        <p class="text-sm font-medium tracking-widest text-red-500 uppercase">
                              Back End Developer
                        </p>

                        <p class="text-2xl font-bold text-white">
                              Fernando Encarnação
                        </p>

                        <div class="mt-1 overflow-hidden">

                              <div
                                    class="translate-y-full opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100">

                                    <p class="text-sm text-white">
                                          Desenvolvedor back-end da SoupNet.
                                    </p>

                              </div>

                        </div>

                  </div>

            </div>


            <div class="group relative h-[600px] overflow-hidden rounded-xl bg-black shadow-xl">

                  <img
                        alt=""
                        src="{{ asset('images/vitor.png') }}"
                        class="absolute inset-0 h-full w-full object-fill opacity-75 transition-opacity duration-300 group-hover:opacity-50">

                  <div class="relative flex h-full flex-col justify-end p-6">

                        <p class="text-sm font-medium tracking-widest text-blue-400 uppercase">
                              Interface Designer
                        </p>

                        <p class="text-2xl font-bold text-white">
                              Víctor Andrade
                        </p>

                        <div class="mt-1 overflow-hidden">

                              <div
                                    class="translate-y-full opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100">

                                    <p class="text-sm text-white">
                                          Interface designer da SoupNet.
                                    </p>

                              </div>

                        </div>

                  </div>

            </div>

      </div>

</div>

@endsection