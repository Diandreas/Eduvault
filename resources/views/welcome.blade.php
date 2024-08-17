<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduVault - Votre portail de ressources éducatives</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary-color: #0275d8; /* Define your primary color here */
        }
        .bg-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, #8d28d0 100%);
        }
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-white">
<div class="min-h-screen flex flex-col">
    <header class="bg-white dark:bg-gray-800 shadow-md">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-[var(--primary-color)]">EduVault</h1>
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-[var(--primary-color)] dark:text-gray-400 dark:hover:text-white transition duration-300">Tableau de bord</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-[var(--primary-color)] dark:text-gray-400 dark:hover:text-white transition duration-300">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="font-semibold text-white bg-[var(--primary-color)] hover:bg-[var(--primary-color)]/80 px-4 py-2 rounded-lg transition duration-300">Inscription</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>
    </header>

    <main class="flex-grow">
        <section class="bg-gradient text-white py-20">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue sur EduVault</h2>
                <p class="text-xl mb-8">Votre portail de ressources éducatives pour tous les niveaux</p>
                <a href="{{ route('register') }}" class="bg-white text-[var(--primary-color)] font-bold py-3 px-8 rounded-full text-lg hover:bg-gray-100 transition duration-300">
                    Commencez dès aujourd'hui
                </a>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-12">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover-scale">
                        <svg class="w-12 h-12 text-[var(--primary-color)] mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <h3 class="text-2xl font-semibold mb-4">Vaste bibliothèque</h3>
                        <p class="text-gray-600 dark:text-gray-400">Accédez à une large gamme de documents pour tous les niveaux scolaires et universitaires.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover-scale">
                        <svg class="w-12 h-12 text-[var(--primary-color)] mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                        <h3 class="text-2xl font-semibold mb-4">Facile à utiliser</h3>
                        <p class="text-gray-600 dark:text-gray-400">Notre interface intuitive vous permet de trouver rapidement les ressources dont vous avez besoin.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover-scale">
                        <svg class="w-12 h-12 text-[var(--primary-color)] mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        <h3 class="text-2xl font-semibold mb-4">Toujours disponible</h3>
                        <p class="text-gray-600 dark:text-gray-400">Accédez à vos documents n'importe où, n'importe quand, sur tous vos appareils.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white dark:bg-gray-800 shadow-md py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-600 dark:text-gray-400">&copy; 2024 EduVault. Tous droits réservés.</p>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-500">Propulsé par Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>
</div>
</body>
</html>
