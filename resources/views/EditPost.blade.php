<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoupNet - Editar Post</title>
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
                    <svg class="sn-nav-item__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    Início
                </a>

                <a href="/Browse" class="sn-nav-item sn-nav-item--active">
                    <svg class="sn-nav-item__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803a7.5 7.5 0 0 0 10.607 0Z" />
                    </svg>

                    Navegar
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

            <div class="sn-main__topbar">
                <h1 class="sn-main__title">
                    Editar postagem
                </h1>
            </div>

            <div class="sn-edit-container">

                <div class="sn-edit-card">

                    <div class="sn-edit-card__label">
                        Post original
                    </div>

                    <div class="sn-card__header">

                        @if(!empty($post->UserProfilePicture))
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
                                Publicação atual
                            </div>
                        </div>

                    </div>

                    @if($post->text)
                    <div class="sn-card__body">
                        {{ $post->text }}
                    </div>
                    @endif

                    @if($post->image_path)
                    <div class="sn-edit-image-wrapper">
                        <img src="{{ Storage::url($post->image_path) }}"
                            alt="Imagem do post"
                            class="sn-edit-image">
                    </div>
                    @endif

                </div>

                <div class="sn-edit-card">

                    <div class="sn-edit-card__label">
                        Atualizar conteúdo
                    </div>

                    <form action="/EditPosted" method="POST" class="sn-edit-form-page">

                        @csrf

                        <input type="hidden"
                            name="postUUID"
                            value="{{ $post->postUUID }}">

                        <textarea
                            name="PostText"
                            class="sn-edit-page__textarea"
                            placeholder="Atualize sua publicação...">{{ $post->text }}</textarea>

                        @if(session('error'))
                        <div class="sn-error">
                            {{ session('error') }}
                        </div>
                        @endif

                        <div class="sn-edit-page__actions">

                            <a href="/ThePost/{{ $post->postUUID }}"
                                class="sn-edit-page__cancel">
                                Cancelar
                            </a>

                            <button type="submit"
                                class="sn-edit-page__submit">
                                Salvar alterações
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </main>

    </div>

</body>

</html>