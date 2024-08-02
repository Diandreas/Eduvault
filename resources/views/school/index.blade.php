<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schools') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ __('Schools') }}</h1>
                    <p class="mt-1 text-sm text-gray-600">Explore our partner institutions</p>
                </div>
                <a href="{{ route('school.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add New School
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($schools as $school)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        <div class="relative pb-48 overflow-hidden">
                            <img loading="lazy" class="absolute inset-0 h-full w-full object-cover" src="{{ old('image', $school?->image ? asset('storage/' . $school->image) : 'https://via.placeholder.com/300x200.png?text=School+Image') }}" alt="{{ $school->name }} Image">
                        </div>

                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $school->name }}</h3>
                            <p class="text-sm text-gray-600 mb-4">{{ Str::limit($school->description, 100) }}</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $school->country->name }}
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-200 bg-gray-50">
                            <a href="{{ route('school.show', $school->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Enter School</a>
                            <div class="mt-2 flex justify-end space-x-2">
                                <a href="{{ route('school.edit', $school->id) }}" class="text-sm text-gray-600 hover:text-gray-900">Edit</a>
                                <form action="{{ route('school.destroy', $school->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this school?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $schools->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
