<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoupNet - {{ $user->name }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            </nav>

            @if(session('name'))
            <div class="sn-sidebar__user" onclick="window.location.href='/profile'">
                <img class="sn-sidebar__user-avatar"
                    src="{{ session('profile_picture') ? Storage::url(session('profile_picture')) : 'https://ui-avatars.com/api/?name=' . urlencode(session('name')) . '&background=fbbf24&color=fff&rounded=true' }}"
                    alt="Avatar">

                <div class="sn-sidebar__user-info">
                    <span class="sn-sidebar__user-name">{{ session('name') }}</span>
                    <span class="sn-sidebar__user-sub">Ver perfil</span>
                </div>
            </div>
            @endif
        </aside>

        <main class="sn-main">

            <section class="sn-user-banner">

                <div class="sn-user-banner__cover"></div>

                <div class="sn-user-banner__content">

                    @if(!empty($user->profile_picture) && Storage::disk('public')->exists($user->profile_picture))
                    <img src="{{ Storage::url($user->profile_picture) }}"
                        alt="Profile Picture"
                        class="sn-user-banner__avatar">
                    @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=fbbf24&color=fff&rounded=true"
                        alt="Avatar"
                        class="sn-user-banner__avatar">
                    @endif

                    <div class="sn-user-banner__info">
                        <h1>{{ $user->name }}</h1>
                        <p>{{ $user->email }}</p>
                    </div>

                </div>

            </section>

            <section class="sn-user-posts">

                <div class="sn-main__topbar">
                    <h2 class="sn-main__title">
                        Posts de {{ $user->name }}
                    </h2>
                </div>

                <div class="sn-feed">

                    @forelse($posts as $post)

                    <article class="sn-card"
                        onclick="window.location.href='/ThePost/{{ $post->postUUID }}'">

                        <div class="sn-card__header">

                            @if(!empty($post->UserProfilePicture) && Storage::disk('public')->exists($post->UserProfilePicture))
                            <img src="{{ Storage::url($post->UserProfilePicture) }}"
                                alt="Avatar"
                                class="sn-card__avatar">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user_name) }}&background=fbbf24&color=fff&rounded=true"
                                alt="Avatar"
                                class="sn-card__avatar">
                            @endif

                            <div>
                                <div class="sn-card__username">
                                    {{ $post->user_name }}
                                </div>

                                <div class="sn-card__time">
                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </div>
                            </div>

                        </div>

                        @if($post->text)
                        <div class="sn-card__body">
                            {{ $post->text }}
                        </div>
                        @endif

                        @if($post->image_path)
                        <div class="sn-card__img-wrapper" onclick="event.stopPropagation()">

                            <img src="{{ Storage::url($post->image_path) }}"
                                alt="Imagem do post"
                                class="sn-card__img"
                                onclick="document.getElementById('sn-lightbox').querySelector('img').src=this.src; document.getElementById('sn-lightbox').classList.add('sn-lightbox--open')">

                        </div>
                        @endif

                        <div class="sn-card__footer" onclick="event.stopPropagation()">

                            <a href="/ThePost/{{ $post->postUUID }}"
                                class="sn-card__action">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    style="width:16px;height:16px">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />

                                </svg>

                                Comentários
                            </a>

                        </div>

                    </article>

                    @empty

                    <div class="sn-empty">
                        <p>Esse usuário ainda não publicou nada.</p>
                    </div>

                    @endforelse

                </div>

            </section>

        </main>

    </div>

    <div class="sn-lightbox"
        id="sn-lightbox"
        onclick="this.classList.remove('sn-lightbox--open')">

        <img src=""
            alt="Imagem ampliada"
            class="sn-lightbox__img">

    </div>

</body>

</html>