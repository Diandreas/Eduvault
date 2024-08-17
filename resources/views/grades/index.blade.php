<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="sm:flex sm:items-center sm:justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Grade List') }}</h3>
                            <p class="mt-1 text-sm text-gray-600">Manage and view all grade levels.</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <a href="{{ route('grades.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                Add New Grade
                            </a>
                        </div>
                    </div>

                     <!-- Recherche -->
                     <div class="py-1 bg-gray-100">
                        <div class="max-w-full mx-auto sm:px-1 lg:px-1 space-y-6">
                            <div class="p-1 sm:p-1 bg-white shadow sm:rounded-lg">
                                <div class="w-full">
                                    <form method="GET" action="{{ route('grades.index') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf
                                            <input type="text" name="search"  placeholder=" search a grade....">
                                            <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-4 py-2 text-white">{{ __('Search') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Name</th>
                                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Description</th>
                                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Min Score</th>
                                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Actions</th>
{{--                                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Max Score</th>--}}
{{--                                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs text-right">Actions</th>--}}
{{--                            </tr>--}}
                            </thead>
                            <tbody>
                            @foreach ($grades as $grade)
                                <tr>
                                    <td class="border-b border-gray-200 px-6 py-4 text-sm">{{ $grade->name }}</td>
                                    <td class="border-b border-gray-200 px-6 py-4 text-sm">{{ $grade->description }}</td>
                                    <td class="border-b border-gray-200 px-6 py-4 text-sm">{{ $grade->min_score }}</td>
                                    <td class="border-b border-gray-200 px-6 py-4 text-sm">{{ $grade->max_score }}</td>
                                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-right">
                                        <a href="{{ route('grades.show', $grade->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Show</a>
                                        <a href="{{ route('grades.edit', $grade->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this grade?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
