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

        <main class="sn-main sn-main--post">

            <div class="sn-post-back">
                <a href="/Browse" class="sn-back-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Voltar ao feed
                </a>
            </div>

            <div class="sn-post-layout">

                <div class="sn-comments-col">

                    <span class="sn-divider">
                        <span class="sn-divider__line"></span>
                        <span class="sn-divider__label">Comentários · {{ $comments->count() }}</span>
                        <span class="sn-divider__line"></span>
                    </span>

                    @if($comments->isEmpty())
                    <p class="sn-comments-empty">Nenhum comentário ainda. Seja o primeiro!</p>
                    @endif

                    @foreach($comments as $comment)
                    <div class="sn-comment">
                        <div class="sn-comment__header">
                            @if(!empty($comment->profile_picture) && Storage::disk('public')->exists($comment->profile_picture))
                            <img src="{{ Storage::url($comment->profile_picture) }}" alt="Avatar" class="sn-comment__avatar">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user_name ?? 'U') }}&background=fbbf24&color=fff&rounded=true"
                                alt="Avatar" class="sn-comment__avatar">
                            @endif
                            <div class="sn-comment__meta">
                                <span class="sn-comment__username">{{ $comment->user_name ?? 'Usuário' }}</span>
                                <span class="sn-comment__time">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="sn-comment__body">{{ $comment->comment }}</div>

                        @if(session('email') === $comment->email)
                        <div class="sn-comment__actions">
                            <form action="/deleteComment" method="POST" style="display:inline" onsubmit="return confirm('Apagar comentário?')">
                                @csrf
                                <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <button type="submit" class="sn-comment__delete-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:13px;height:13px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Apagar
                                </button>
                            </form>
                        </div>

                        <div class="sn-edit-form" id="edit-{{ $loop->index }}" style="display:none">
                            <form action="/commenting" method="POST">
                                @csrf
                                <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <textarea name="comment" class="sn-edit-form__textarea">{{ $comment->comment }}</textarea>
                                <div class="sn-edit-form__actions">
                                    <button type="button" class="sn-edit-form__cancel" onclick="toggleEditForm('edit-{{ $loop->index }}')">Cancelar</button>
                                    <button type="submit" class="sn-edit-form__save">Salvar</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                    @endforeach

                    @if(session('name'))
                    <div class="sn-new-comment">
                        <span class="sn-divider">
                            <span class="sn-divider__line"></span>
                            <span class="sn-divider__label">Deixar comentário</span>
                            <span class="sn-divider__line"></span>
                        </span>
                        <form action="/commenting" method="POST" class="sn-new-comment__form">
                            @csrf
                            <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                            <textarea name="comment" class="sn-edit-form__textarea" required></textarea> <button type="submit" class="sn-new-comment__btn">Comentar</button>
                        </form>
                    </div>
                    @else
                    <p class="sn-comments-empty" style="margin-top:1rem">
                        <a href="/SignIn" style="color:#eab308">Entre</a> para comentar.
                    </p>
                    @endif

                </div>

                <div class="sn-post-col">
                    <div class="sn-post-card">

                        <div class="sn-post-card__header" onclick="window.location.href='/UserInfo/{{ $post->user_name }}'">
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
                        <div class="sn-post-card__body">{{ $post->text }}</div>
                        @endif

                        @if($post->image_path)
                        <img src="{{ Storage::url($post->image_path) }}" alt="Imagem do post" class="sn-post-card__img"
                            onclick="document.getElementById('sn-lightbox').querySelector('img').src=this.src; document.getElementById('sn-lightbox').classList.add('sn-lightbox--open')">
                        @endif

                        @if(session('name') === $post->user_name)
                        <div class="sn-post-card__owner-actions">
                            <a href="/EditPost/{{ $post->postUUID }}" class="sn-post-card__edit-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:14px;height:14px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                </svg>
                                Editar post
                            </a>
                            <form action="/deletePost" method="POST" style="display:inline" onsubmit="return confirm('Apagar este post?')">
                                @csrf
                                <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                                <button type="submit" class="sn-post-card__delete-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:14px;height:14px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Apagar post
                                </button>
                            </form>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="sn-lightbox" id="sn-lightbox" onclick="this.classList.remove('sn-lightbox--open')">
        <img src="" alt="Imagem ampliada" class="sn-lightbox__img">
    </div>

    <script>
        function toggleEditForm(id) {
            const el = document.getElementById(id);
            el.style.display = el.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body