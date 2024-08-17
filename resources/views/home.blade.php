<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document Search') }}
        </h2>
    </x-slot>

    <style>
        :root {
            --primary-color: #1A73E8; /* Définissez votre couleur primaire ici */
        }
    </style>

    <header class="bg-white dark:bg-gray-800 shadow-md">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">EduVault</h1>
                <div class="space-x-4">
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-primary dark:text-gray-400 dark:hover:text-white transition duration-300">Tableau de bord</a>
                    <button type="button" class="font-semibold text-white bg-primary hover:bg-primary/80 px-4 py-2 rounded-lg transition duration-300" data-toggle="modal" data-target="#searchModal">
                        Recherche avancée
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow">
        <section class="bg-primary text-white py-20">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Recherche de documents</h2>
                <p class="text-xl mb-8">Trouvez rapidement les ressources dont vous avez besoin</p>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-12 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover-scale">
                        <svg class="w-12 h-12 text-primary mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <h3 class="text-2xl font-semibold mb-4">Vaste bibliothèque</h3>
                        <p class="text-gray-600 dark:text-gray-400">Accédez à une large gamme de documents pour tous les niveaux scolaires et universitaires.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover-scale">
                        <svg class="w-12 h-12 text-primary mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                        <h3 class="text-2xl font-semibold mb-4">Recherche avancée</h3>
                        <p class="text-gray-600 dark:text-gray-400">Utilisez nos filtres pour trouver rapidement les documents dont vous avez besoin.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover-scale">
                        <svg class="w-12 h-12 text-primary mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        <h3 class="text-2xl font-semibold mb-4">Toujours disponible</h3>
                        <p class="text-gray-600 dark:text-gray-400">Accédez à vos documents n'importe où, n'importe quand, sur tous vos appareils.</p>
                    </div>
                </div>

                <!-- Document List -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg transition-all duration-300 hover:shadow-xl">
                    <div class="p-8 border-b border-gray-200">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Liste des documents</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-700">
                                <thead>
                                <tr class="bg-gray-100 dark:bg-gray-600">
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Nom</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Format</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Taille</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Cours</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">École</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Niveau</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Période</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-500">
                                @foreach ($documents as $doc)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                                        <td class="py-4 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $doc->name }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-300">{{ $doc->format }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-300">{{ $doc->size }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-300">{{ $doc->course->name }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-300">{{ $doc->school->name }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-300">{{ $doc->grade->name }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-300">{{ $doc->period->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- The Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">{{ __('Document Search') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('documents.search') }}" method="GET">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Document Name') }}</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="course_id" class="block text-sm font-medium text-gray-700">{{ __('Course') }}</label>
                            <select id="course_id" name="course_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                <option value="">{{ __('All Courses') }}</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="school_id" class="block text-sm font-medium text-gray-700">{{ __('School') }}</label>
                            <select id="school_id" name="school_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                <option value="">{{ __('All Schools') }}</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="period_id" class="block text-sm font-medium text-gray-700">{{ __('Period') }}</label>
                            <select id="period_id" name="period_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                <option value="">{{ __('All Periods') }}</option>
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="grade_id" class="block text-sm font-medium text-gray-700">{{ __('Grade') }}</label>
                            <select id="grade_id" name="grade_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                <option value="">{{ __('All Grades') }}</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                {{ __('Search') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fonction de recherche pour chaque sélecteur
            $('#course_id, #school_id, #period_id, #grade_id').each(function() {
                $(this).select2({
                    placeholder: "Select an option",
                    allowClear: true
                });
            });
        });
    </script>
</x-app-layout>
