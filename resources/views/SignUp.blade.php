<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up — SoupNet</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-yellow-100 via-orange-50 to-yellow-50 flex items-center justify-center px-4 py-32">

    <div class="w-full max-w-md">
        <div class="rounded-[2rem] bg-white/80 p-8 shadow-2xl backdrop-blur-sm border border-white/40">

            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900">Criar conta</h1>
                <p class="mt-3 text-gray-600">Junte-se ao SoupNet e comece a explorar.</p>
            </div>

            @if(isset($error))
            <div class="mt-6 flex items-start rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700 shadow-sm" role="alert">
                <svg class="mt-0.5 mr-3 h-5 w-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.007v.008H12v-.008ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p><span class="font-semibold">Erro:</span> {{ $error }}</p>
            </div>
            @endif

            {{-- Avatar Upload --}}
            <div class="mt-8 flex flex-col items-center gap-2">
                <div
                    id="avatarRing"
                    onclick="document.getElementById('profile_picture').click()"
                    class="h-24 w-24 cursor-pointer overflow-hidden rounded-full border-[3px] border-dashed border-yellow-400 bg-yellow-50 flex items-center justify-center transition hover:border-yellow-500 hover:shadow-[0_0_0_4px_#fef3c7]">

                    <img id="avatarPreview" src="" alt="" class="hidden h-full w-full object-cover">

                    <div id="avatarPlaceholder" class="flex flex-col items-center gap-1 text-yellow-700">
                        <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                        </svg>
                        <span class="text-[0.7rem] font-semibold">Foto de perfil</span>
                    </div>
                </div>
                <span class="text-xs text-gray-400">Opcional · Clique para escolher</span>
            </div>

            <form action="/sign-up" method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf

                <input
                    type="file"
                    id="profile_picture"
                    name="profile_picture"
                    accept="image/*"
                    class="hidden"
                    onchange="previewAvatar(event)">

                <div class="mb-5">
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-700">Seu nome</label>
                    <input
                        type="text" id="name" name="name"
                        placeholder="Digite seu nome" required
                        class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition focus:border-yellow-400 focus:ring-4 focus:ring-yellow-100">
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Seu email</label>
                    <input
                        type="email" id="email" name="email"
                        placeholder="Digite seu email" required
                        class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition focus:border-yellow-400 focus:ring-4 focus:ring-yellow-100">
                </div>

                <div class="mb-6">
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-700">Sua senha</label>
                    <input
                        type="password" id="password" name="password"
                        placeholder="••••••••" required
                        class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition focus:border-yellow-400 focus:ring-4 focus:ring-yellow-100">
                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-yellow-500 px-6 py-3 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-yellow-400 hover:shadow-2xl">
                    Criar conta
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">Já possui uma conta?</p>
                <a href="/signin" class="mt-2 inline-block font-semibold text-yellow-600 transition hover:text-yellow-500 hover:underline">
                    Entrar
                </a>
            </div>

        </div>
    </div>

    <div class="fixed bottom-0 left-0 z-50 w-full border-t border-yellow-200 bg-white/90 backdrop-blur-md">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-yellow-100">
                    <svg class="h-4 w-4 text-yellow-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z" />
                    </svg>
                </div>
                <p class="text-sm text-gray-700">
                    Crie sua conta e descubra o <span class="font-semibold text-yellow-700">SoupNet</span>
                </p>
            </div>
            <a href="/signin" class="rounded-lg bg-yellow-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-yellow-400">
                Entrar
            </a>
        </div>
    </div>

    <script>
        function previewAvatar(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.getElementById('avatarPreview');
                const placeholder = document.getElementById('avatarPlaceholder');
                img.src = e.target.result;
                img.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    </script>

</body>
</html>