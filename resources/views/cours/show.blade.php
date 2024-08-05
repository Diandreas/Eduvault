<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ $cours->name ?? __('Détails du Cours') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $cours->name }}</h1>
                            <p class="mt-2 text-gray-600">{{ $cours->description }}</p>
                        </div>
                        <a href="{{ route('cours.edit', $cours->id) }}" class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Modifier le Cours
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                            <p class="font-bold">Erreur</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p class="font-bold">Succès</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- Documents Section -->
                    <div class="mt-10">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Documents</h2>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="mb-4">
                                <input type="text" id="document-search" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Rechercher un document ou une école...">
                            </div>
                            <ul class="divide-y divide-gray-200" id="document-list">
                                @foreach($cours->documents as $document)
                                    <li class="py-4">
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm font-medium text-gray-900">{{ $document->name }}</div>
                                            <div class="flex items-center">
                                                <span class="mr-2 text-xs text-gray-500">{{ $document->school->name }}</span>
                                                <a href="{{ asset($document->path) }}" class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Télécharger
                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Schools Section -->
                    <div class="mt-10">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Écoles offrant ce cours</h2>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <ul class="divide-y divide-gray-200">
                                @foreach($cours->schools as $school)
                                    <li class="py-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-900">{{ $school->name }}</h3>
                                                <p class="mt-1 text-sm text-gray-500">{{ $school->description }}</p>
                                            </div>
                                            <a href="#" class="ml-4 text-sm font-medium text-indigo-600 hover:text-indigo-500">En savoir plus</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('document-search').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const documents = document.querySelectorAll('#document-list li');
            documents.forEach(document => {
                const text = document.textContent.toLowerCase();
                document.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</x-app-layout>
