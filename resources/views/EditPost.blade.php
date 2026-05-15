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

<div class="edit-post-layout">

    <div class="edit-post-panel">
        <div class="edit-post-card">
            <div class="edit-post-card__header">
                <p><strong>{{ $post->user_name }}</strong></p>
            </div>
            <div class="edit-post-card__body">
                <p>{{ $post->text }}</p>
            </div>
            <div class="edit-post-card__image-wrapper">
                <img src="{{ Storage::url($post->image_path) }}" alt="Post Image" class="edit-post-card__image">
            </div>
        </div>
    </div>

    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD2YzuHj69tqYuCLnw_AnvX6AnWofdJGGScg&s" alt="Edit Post Image" class="edit-post-banner">

    <div class="edit-post-panel">
        <div class="edit-post-card">
            <div class="edit-post-card__header">
                <p><strong>{{ $post->user_name }}</strong></p>
            </div>

            <form action="/EditPosted" method="POST">
                @csrf
                <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                <textarea name="PostText" class="edit-post-form__textarea" placeholder="Write your updated text here"></textarea>
                <button type="submit" class="edit-post-form__btn">Save Changes</button>
                @if(session('error'))
                <p class="edit-post-form__error">{{ session('error') }}</p>
                @endif
            </form>

            <div class="edit-post-card__image-wrapper">
                <img src="{{ Storage::url($post->image_path) }}" alt="Post Image" class="edit-post-card__image">
            </div>
        </div>
    </div>

</div>

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

</body>
