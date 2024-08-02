<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduVault - Votre portail de ressources éducatives</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <div class="flex lg:justify-center lg:col-start-2">
                    <h1 class="text-4xl font-bold text-[#FF2D20] dark:text-white">EduVault</h1>
                </div>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Tableau de bord
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Connexion
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Inscription
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <main class="mt-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4 text-black dark:text-white">Bienvenue sur EduVault</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-400">Votre portail de ressources éducatives pour tous les niveaux</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h3 class="text-2xl font-semibold mb-4 text-black dark:text-white">Vaste bibliothèque</h3>
                        <p class="text-gray-600 dark:text-gray-400">Accédez à une large gamme de documents pour tous les niveaux scolaires et universitaires.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h3 class="text-2xl font-semibold mb-4 text-black dark:text-white">Facile à utiliser</h3>
                        <p class="text-gray-600 dark:text-gray-400">Notre interface intuitive vous permet de trouver rapidement les ressources dont vous avez besoin.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h3 class="text-2xl font-semibold mb-4 text-black dark:text-white">Toujours disponible</h3>
                        <p class="text-gray-600 dark:text-gray-400">Accédez à vos documents n'importe où, n'importe quand, sur tous vos appareils.</p>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-[#FF2D20] text-white font-semibold rounded-lg hover:bg-[#FF2D20]/80 transition duration-300">
                        Commencez dès aujourd'hui
                    </a>
                </div>
            </main>

            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                <p>&copy; 2024 EduVault. Tous droits réservés.</p>
                <p class="mt-2">Propulsé par Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            </footer>
        </div>
    </div>
</div>
</body>
</html>
