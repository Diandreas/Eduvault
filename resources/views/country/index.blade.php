<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Countries') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Countries') }}</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Countries') }}.</p>
                    </div>
                    <div>
                        <a href="{{ route('country.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Add new
                        </a>
                    </div>
                </div>

                <!-- Recherche -->
                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <form method="GET" action="{{ route('country.index') }}" class="flex items-center space-x-4">
                        @csrf
                        <input type="text" name="search" placeholder="Search a country..." class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('Search') }}
                        </button>
                    </form>
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Abbr</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($countries as $country)
                            <tr class="even:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $country->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $country->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $country->abbr }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="{{ route('country.destroy', $country->id) }}" method="POST">
                                        <a href="{{ route('country.show', $country->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                        <a href="{{ route('country.edit', $country->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900 mr-2">{{ __('Edit') }}</a>
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('country.destroy', $country->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4 px-4">
                        {!! $countries->withQueryString()->links() !!}
                    </div>
                </div>

                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="mt-8 bg-white p-6 rounded-lg shadow">
                    @csrf
                    <div class="col-span-full">
                        <label for="file-upload" class="block text-sm font-medium leading-6 text-gray-900">Import Excel File</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="flex items-center justify-center w-full">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">XLSX, XLS, CSV up to 10MB</p>
                                    </div>
                                    <input id="file-upload" name="file" type="file" accept=".xlsx,.xls,.csv" class="sr-only">
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-4 py-2 text-white">Import</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
