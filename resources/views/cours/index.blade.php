<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Courses') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ __('Courses') }}</h1>
                    <p class="mt-1 text-sm text-gray-600">Explore our available courses</p>
                </div>
                <a href="{{ route('cours.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add New Course
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($allcours as $cours)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $cours->name }}</h3>
                            <p class="text-sm text-gray-600 mb-4">{{ Str::limit($cours->description, 100) }}</p>
                            @if($cours->parent_id)
                                <div class="text-sm text-gray-500 mb-4">
                                    <span class="font-medium">Parent Course:</span> {{ $cours->parent_id }}
                                </div>
                            @endif
                        </div>
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('cours.edit', $cours->id) }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                <form action="{{ route('cours.destroy', $cours->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-900 font-medium" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
