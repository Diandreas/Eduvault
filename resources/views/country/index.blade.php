<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Countries') }}
        </h2>
    </x-slot>

    <!-- Recherche
    <div class="py-12 bg-gray-100">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-1 sm:p-4 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <form method="GET" action="{{ route('country.index') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                            <input type="text" name="search" placeholder=" search a country....">
                            <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-4 py-2 text-white">{{ __('Search') }}</button>
                     </form>
                </div>
            </div>
        </div>
    </div>   -->




    <div class="py-5">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Countries') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Countries') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('country.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>

                    </div>

                     <!-- Recherche -->
                    <div class="py-1 bg-gray-100">
                        <div class="max-w-full mx-auto sm:px-1 lg:px-1 space-y-6">
                            <div class="p-1 sm:p-1 bg-white shadow sm:rounded-lg">
                                <div class="w-full">
                                    <form method="GET" action="{{ route('country.index') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf
                                            <input type="text" name="search"  placeholder=" search a country....">
                                            <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-4 py-2 text-white">{{ __('Search') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
{{--                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <h2>Add with file</h2>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <input type="file" name="file" class="border rounded py-2 px-3 mr-2">--}}
{{--                                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Upload</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}



                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>

									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Abbr</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                        
                                    @foreach ($countries as $country)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ $country->id }}</td>

										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $country->name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $country->abbr }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('country.destroy', $country->id) }}" method="POST">
                                                    <a href="{{ route('country.show', $country->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <a href="{{ route('country.edit', $country->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
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
                        </div>
                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-span-full">
                                <label for="file-upload" class="block text-sm font-medium leading-6 text-gray-900">Import Excel File</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
{{--                                    <div class="text-center">--}}
{{--                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">--}}
{{--                                            <!-- SVG content -->--}}
{{--                                        </svg>--}}
{{--                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">--}}
{{--                                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">--}}
{{--                                                <span>Upload an Excel file</span>--}}
{{--                                                <input id="file-upload" name="file" type="file" accept=".xlsx,.xls,.csv" class="sr-only">--}}
{{--                                            </label>--}}
{{--                                            <p class="pl-1">or drag and drop</p>--}}
{{--                                        </div>--}}
{{--                                        <p class="text-xs leading-5 text-gray-600">XLSX, XLS, CSV up to 10MB</p>--}}
{{--                                    </div>--}}


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
        </div>
    </div>
</x-app-layout>
