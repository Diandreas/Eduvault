<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Widgets -->
                        <div class="bg-blue-100 dark:bg-blue-800 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200 mb-2">Total des documents</h3>
                            <p class="text-3xl font-bold text-blue-600 dark:text-blue-300">99 909</p>
                        </div>
                        <div class="bg-green-100 dark:bg-green-800 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-green-800 dark:text-green-200 mb-2">Cours suivis</h3>
                            <p class="text-3xl font-bold text-green-600 dark:text-green-300">10</p>
                        </div>
                        <div class="bg-purple-100 dark:bg-purple-800 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-purple-800 dark:text-purple-200 mb-2">Dernière activité</h3>
                            <p class="text-xl text-purple-600 dark:text-purple-300">Lecture</p>
                        </div>
                    </div>

                    <!-- Navigation rapide -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Navigation rapide</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <a href="{{ route('cours.create') }}" class="flex items-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                                <svg class="w-6 h-6 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <span class="text-gray-700 dark:text-gray-300">Cours</span>
                            </a>
                            <a href="{{ route('documents.index') }}" class="flex items-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                                <svg class="w-6 h-6 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <span class="text-gray-700 dark:text-gray-300">Documents</span>
                            </a>
                            <a href="{{ route('school.index') }}" class="flex items-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                                <svg class="w-6 h-6 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                <span class="text-gray-700 dark:text-gray-300">Écoles</span>
                            </a>
                            <a href="{{ route('schoollevel.index') }}" class="flex items-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                                <svg class="w-6 h-6 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                <span class="text-gray-700 dark:text-gray-300">Niveaux scolaires</span>
                            </a>
                        </div>
                    </div>

                    <!-- Documents récents -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Documents récents</h3>
                        <div class="bg-white dark:bg-gray-700 shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cours</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Format</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Taille</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date d'ajout</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                <!-- Vous pouvez ajouter ici une boucle pour afficher les documents récents -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">Document 1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">Cours A</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">PDF</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">2.5 MB</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">01/08/2024</td>
                                </tr>
                                <!-- Ajoutez plus de lignes si nécessaire -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

