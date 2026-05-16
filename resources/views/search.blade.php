<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoupNet - Pesquisa</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>

    <div class="sn-shell">

        {{-- SIDEBAR --}}
        <aside class="sn-sidebar">
            <a href="/" class="sn-sidebar__logo">
                <img src="https://media.istockphoto.com/id/1209262314/pt/vetorial/bowl-of-hot-soup-hand-drawn-doodle-icon-miso-soup-vector-sketch-illustration-cartoon.jpg?s=612x612&w=0&k=20&c=eFeugpUflQIVvES49u2M9C42wE3w1xtVJ-XwOfI0L-w="
                    alt="SoupNet"
                    class="sn-sidebar__logo-img">

                <span class="sn-sidebar__logo-name">
                    SoupNet
                </span>
            </a>

            <nav class="sn-sidebar__nav">

                <a href="/" class="sn-nav-item">
                    Início
                </a>

                <a href="/Browse" class="sn-nav-item sn-nav-item--active">
                    Navegar
                </a>

                <a href="/about" class="sn-nav-item">
                    Sobre
                </a>

            </nav>

            @if(session('name'))
            <div class="sn-sidebar__user"
                onclick="window.location.href='/profile'">

                <img class="sn-sidebar__user-avatar"
                    src="{{ session('profile_picture') ? Storage::url(session('profile_picture')) : 'https://ui-avatars.com/api/?name=' . urlencode(session('name')) . '&background=fbbf24&color=fff&rounded=true' }}"
                    alt="Avatar">

                <div class="sn-sidebar__user-info">
                    <span class="sn-sidebar__user-name">
                        {{ session('name') }}
                    </span>

                    <span class="sn-sidebar__user-sub">
                        Ver perfil
                    </span>
                </div>

            </div>
            @endif
        </aside>

        {{-- MAIN --}}
        <main class="sn-main">

            {{-- TOPO --}}
            <div class="sn-search-header">

                <div>
                    <h1 class="sn-search-title">
                        Resultados para "{{ $query }}"
                    </h1>

                    <p class="sn-search-subtitle">
                        Explore posts e usuários relacionados à sua pesquisa.
                    </p>
                </div>

                <a href="/Browse" class="sn-back-btn">
                    Voltar
                </a>

            </div>

            {{-- SEARCHBAR --}}
            <form action="/search" method="GET" class="sn-search-form">
                <input
                    type="text"
                    name="query"
                    placeholder="Pesquisar usuários e conteúdo..."
                    class="sn-search-input"
                    value="{{ $query }}">

                <button type="submit" class="sn-search-btn">
                    Buscar
                </button>
            </form>

            {{-- USERS --}}
            <section class="sn-users-section">

                <div class="sn-section-header">
                    <h2 class="sn-section-title">
                        Usuários encontrados
                    </h2>
                </div>

                @if($users->count() > 0)

                <div class="sn-users-grid">

                    @foreach($users as $user)

                    <div class="sn-user-card"
                        onclick="window.location.href='/UserInfo/{{ $user->name }}'">

                        <div class="sn-user-card__left">

                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=fbbf24&color=fff&rounded=true"
                                alt="Avatar"
                                class="sn-user-card__avatar">

                            <div class="sn-user-card__info">

                                <span class="sn-user-card__name">
                                    {{ $user->name }}
                                </span>

                                <span class="sn-user-card__email">
                                    {{ $user->email }}
                                </span>

                            </div>

                        </div>

                        <button class="sn-user-card__btn">
                            Ver perfil
                        </button>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="sn-empty-state">
                    Nenhum usuário encontrado.
                </div>

                @endif

            </section>

            {{-- POSTS --}}
            <section class="sn-posts-section">

                <div class="sn-section-header">
                    <h2 class="sn-section-title">
                        Posts encontrados
                    </h2>
                </div>

                @if($posts->count() > 0)

                <div class="sn-feed">

                    @foreach($posts as $post)

                    <article class="sn-card"
                        onclick="window.location.href='/ThePost/{{ $post->postUUID }}'">

                        <div class="sn-card__header"
                            onclick="event.stopPropagation(); window.location.href='/UserInfo/{{ $post->user_name }}'">

                            @if(!empty($post->UserProfilePicture) && Storage::disk('public')->exists($post->UserProfilePicture))

                            <img
                                src="{{ Storage::url($post->UserProfilePicture) }}"
                                alt="Avatar"
                                class="sn-card__avatar">

                            @else

                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode($post->user_name) }}&background=fbbf24&color=fff&rounded=true"
                                alt="Avatar"
                                class="sn-card__avatar">

                            @endif

                            <div>

                                <div class="sn-card__username">
                                    {{ $post->user_name }}
                                </div>

                                <div class="sn-card__time">
                                    Resultado encontrado
                                </div>

                            </div>

                        </div>

                        @if($post->text)
                        <div class="sn-card__body">
                            {{ $post->text }}
                        </div>
                        @endif

                        @if($post->image_path)

                        <div class="sn-card__img-wrapper"
                            onclick="event.stopPropagation()">

                            <img
                                src="{{ Storage::url($post->image_path) }}"
                                alt="Imagem do post"
                                class="sn-card__img">

                        </div>

                        @endif

                        <div class="sn-card__footer">

                            <a href="/ThePost/{{ $post->postUUID }}"
                                class="sn-card__action">

                                Ver post

                            </a>

                        </div>

                    </article>

                    @endforeach

                </div>

                @else

                <div class="sn-empty-state">
                    Nenhum post encontrado.
                </div>

                @endif

            </section>

        </main>

    </div>

</body>
