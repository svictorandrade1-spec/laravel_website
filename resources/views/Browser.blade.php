<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoupNet - Navegação</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="sn-shell">

        {{-- SIDEBAR --}}
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
                <a href="/Browse" class="sn-nav-item sn-nav-item--active">
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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sn-sidebar__user-dots">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </div>
            @endif
        </aside>

        {{-- MAIN --}}
        <main class="sn-main">

            {{-- Topo --}}
            <div class="sn-main__topbar">
                <h1 class="sn-main__title">Feed</h1>
                @if(session('name'))
                <button class="sn-btn-new" onclick="document.getElementById('sn-modal').classList.add('sn-modal--open')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="sn-btn-new__icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Novo post
                </button>
                @endif
            </div>

            {{-- Pesquisa --}}
            <form action="/search" method="GET" class="sn-search-form">
                <input type="text" name="query" placeholder="Pesquisar usuários e conteúdo..." class="sn-search-input">
                <button type="submit" class="sn-search-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803a7.5 7.5 0 0 0 10.607 0Z" />
                    </svg>
                </button>
            </form>

            @if(session('error'))
            <div class="sn-error">{{ session('error') }}</div>
            @endif

            {{-- Feed --}}
            <div class="sn-feed">
                @forelse($posts as $post)
                <article class="sn-card" onclick="window.location.href='/ThePost/{{ $post->postUUID }}'">

                    <div class="sn-card__header" onclick="event.stopPropagation(); window.location.href='/UserInfo/{{ $post->user_name }}'">
                        @if(!empty($post->UserProfilePicture) && Storage::disk('public')->exists($post->UserProfilePicture))
                        <img src="{{ Storage::url($post->UserProfilePicture) }}" alt="Avatar" class="sn-card__avatar">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user_name) }}&background=fbbf24&color=fff&rounded=true"
                            alt="Avatar" class="sn-card__avatar">
                        @endif
                        <div>
                            <div class="sn-card__username">{{ $post->user_name }}</div>
                            <div class="sn-card__time">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>
                        </div>
                    </div>

                    @if($post->text)
                    <div class="sn-card__body">{{ $post->text }}</div>
                    @endif

                    @if($post->image_path)
                    <div class="sn-card__img-wrapper" onclick="event.stopPropagation()">
                        <img src="{{ Storage::url($post->image_path) }}" alt="Imagem do post" class="sn-card__img"
                            onclick="document.getElementById('sn-lightbox').querySelector('img').src=this.src; document.getElementById('sn-lightbox').classList.add('sn-lightbox--open')">
                    </div>
                    @endif

                    <div class="sn-card__footer" onclick="event.stopPropagation()">
                        <a href="/ThePost/{{ $post->postUUID }}" class="sn-card__action">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:16px;height:16px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                            Comentários
                        </a>
                    </div>

                </article>
                @empty
                <div class="sn-empty">
                    <p>Nenhuma postagem ainda. Seja o primeiro!</p>
                </div>
                @endforelse
            </div>

            {{-- Paginação --}}
            @if(isset($posts) && method_exists($posts, 'links'))
            <div class="sn-pagination">
                {{ $posts->links() }}
            </div>
            @endif

        </main>
    </div>

    {{-- Modal novo post --}}
    <div class="sn-modal" id="sn-modal" onclick="if(event.target===this)this.classList.remove('sn-modal--open')">
        <div class="sn-modal__box">
            <div class="sn-modal__header">
                <span class="sn-modal__title">Nova postagem</span>
                <button class="sn-modal__close" onclick="document.getElementById('sn-modal').classList.remove('sn-modal--open')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:18px;height:18px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="/upload" method="POST" enctype="multipart/form-data" class="sn-modal__form">
                @csrf
                <textarea name="PostText" class="sn-modal__textarea" placeholder="O que está acontecendo?"></textarea>

                <label class="sn-modal__file-label">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                    </svg>
                    <span id="sn-file-label-text">Adicionar imagem (opcional)</span>
                    <input type="file" name="PostImage" accept="image/*" class="sn-modal__file-input" onchange="document.getElementById('sn-file-label-text').textContent = this.files[0]?.name ?? 'Adicionar imagem (opcional)'">
                </label>

                <div class="sn-modal__actions">
                    <button type="button" class="sn-modal__btn-cancel" onclick="document.getElementById('sn-modal').classList.remove('sn-modal--open')">Cancelar</button>
                    <button type="submit" class="sn-modal__btn-post">Publicar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Lightbox --}}
    <div class="sn-lightbox" id="sn-lightbox" onclick="this.classList.remove('sn-lightbox--open')">
        <img src="" alt="Imagem ampliada" class="sn-lightbox__img">
    </div>

</body>