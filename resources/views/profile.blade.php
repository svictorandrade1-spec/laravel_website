<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    <title>@yield('title')</title>

</head>

<body>
    <div class="sn-shell">

        <aside class="sn-sidebar">
            <a href="/" class="sn-sidebar__logo">
                <img src="https://media.istockphoto.com/id/1209262314/pt/vetorial/bowl-of-hot-soup-hand-drawn-doodle-icon-miso-soup-vector-sketch-illustration-cartoon.jpg?s=612x612&w=0&k=20&c=eFeugpUflQIVvES49u2M9C42wE3w1xtVJ-XwOfI0L-w="
                    alt="SoupNet" class="sn-sidebar__logo-img">
                <span class="sn-sidebar__logo-name">SoupNet</span>
            </a>
            <nav class="sn-sidebar__nav">
                <a href="/" class="sn-nav-item">
                    <svg class="sn-nav-item__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Início
                </a>
                <a href="/Browse" class="sn-nav-item">
                    <svg class="sn-nav-item__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803a7.5 7.5 0 0 0 10.607 0Z" />
                    </svg>
                    Navegar
                </a>
                <a href="/about" class="sn-nav-item">
                    <svg class="sn-nav-item__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    Sobre
                </a>
                <a href="/help" class="sn-nav-item">
                    <svg class="sn-nav-item__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                    </svg>
                    Ajuda
                </a>
            </nav>
            <div class="sn-sidebar__user sn-nav-item--active" onclick="window.location.href='/profile'">
                <img class="sn-sidebar__user-avatar"
                    src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=fbbf24&color=fff&rounded=true' }}"
                    alt="Avatar">
                <div class="sn-sidebar__user-info">
                    <span class="sn-sidebar__user-name">{{ $user->name }}</span>
                    <span class="sn-sidebar__user-sub">Meu perfil</span>
                </div>
            </div>
        </aside>

        <main class="sn-main">

            <div class="sn-main__topbar">
                <h1 class="sn-main__title">Meu perfil</h1>
                <a href="/logout"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                    Sair
                </a>
            </div>

            @if(session('error'))
            <div class="mx-6 mt-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
            @endif

            <div class="border-b border-gray-100 px-6 py-8">
                <div class="flex items-start gap-6">

                    <div class="relative flex-shrink-0">
                        @if($user->profile_picture)
                        <img src="{{ Storage::url($user->profile_picture) }}" alt="Foto de perfil"
                            class="h-24 w-24 rounded-full object-cover ring-4 ring-yellow-200">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=fbbf24&color=fff&rounded=true&size=96"
                            alt="Avatar" class="h-24 w-24 rounded-full ring-4 ring-yellow-200">
                        @endif
                    </div>

                    <div class="flex-1 min-w-0">
                        <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                        <p class="mt-0.5 text-sm text-gray-500">{{ $user->email }}</p>
                        <p class="mt-1 text-sm text-gray-400">{{ $posts->count() }} {{ $posts->count() === 1 ? 'post' : 'posts' }}</p>

                        <div class="mt-4 flex flex-wrap gap-3">
                            <form action="/updateProfilePicture" method="POST" enctype="multipart/form-data"
                                class="flex items-center gap-2">
                                @csrf
                                <label class="flex cursor-pointer items-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-700 transition hover:border-yellow-300 hover:bg-yellow-50 hover:text-yellow-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                    </svg>
                                    <span id="photo-label">{{ $user->profile_picture ? 'Alterar foto' : 'Adicionar foto' }}</span>
                                    <input type="file" name="profile_picture" accept="image/*" class="hidden"
                                        onchange="document.getElementById('photo-label').textContent = this.files[0]?.name ?? 'Alterar foto'; this.closest('form').querySelector('button').click()">
                                </label>
                                <button type="submit" class="hidden"></button>
                            </form>

                            @if($user->profile_picture)
                            <form action="/removeProfilePicture" method="POST"
                                onsubmit="return confirm('Remover foto de perfil?')">
                                @csrf
                                <button type="submit"
                                    class="flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Remover foto
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center px-6 py-4">
                <span class="h-px flex-1 bg-gray-100"></span>
                <span class="shrink-0 px-4 text-sm text-gray-400">Suas postagens</span>
                <span class="h-px flex-1 bg-gray-100"></span>
            </div>

            @if($posts->count() === 0)
            <div class="flex flex-col items-center gap-3 py-16 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="h-12 w-12 text-gray-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <p class="text-sm text-gray-400">Você ainda não postou nada.</p>
                <a href="/Browse"
                    class="mt-1 rounded-lg bg-yellow-400 px-5 py-2 text-sm font-semibold text-white transition hover:bg-yellow-500">
                    Criar primeiro post
                </a>
            </div>
            @else
            <div class="sn-feed">
                @foreach($posts as $post)
                <article class="sn-card">

                    <div class="sn-card__header" style="cursor:default">
                        <img src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=fbbf24&color=fff&rounded=true' }}"
                            alt="Avatar" class="sn-card__avatar">
                        <div>
                            <div class="sn-card__username">{{ $post->user_name }}</div>
                            <div class="sn-card__time">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>
                        </div>
                    </div>

                    @if($post->text)
                    <div class="sn-card__body">{{ $post->text }}</div>
                    @endif

                    @if($post->image_path)
                    <div class="sn-card__img-wrapper">
                        <img src="{{ Storage::url($post->image_path) }}" alt="Imagem do post" class="sn-card__img"
                            onclick="document.getElementById('sn-lightbox').querySelector('img').src=this.src; document.getElementById('sn-lightbox').classList.add('sn-lightbox--open')">
                    </div>
                    @endif

                    <div class="sn-card__footer">
                        <a href="/ThePost/{{ $post->postUUID }}" class="sn-card__action">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:15px;height:15px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                            Ver comentários
                        </a>
                        <a href="/EditPost/{{ $post->postUUID }}" class="sn-card__action">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:15px;height:15px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                            </svg>
                            Editar
                        </a>
                        <form action="/deletePost" method="POST" style="display:inline"
                            onsubmit="return confirm('Apagar este post?')">
                            @csrf
                            <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                            <button type="submit" class="sn-card__action" style="background:none;border:none;cursor:pointer;padding:0;font-size:inherit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:15px;height:15px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                Apagar
                            </button>
                        </form>
                    </div>

                </article>
                @endforeach
            </div>
            @endif

        </main>
    </div>

    <div class="sn-lightbox" id="sn-lightbox" onclick="this.classList.remove('sn-lightbox--open')">
        <img src="" alt="Imagem ampliada" class="sn-lightbox__img">
    </div>

</body>