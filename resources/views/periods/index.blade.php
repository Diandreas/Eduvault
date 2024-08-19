<!-- resources/views/periods/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Periods') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Periods') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">List of all {{ __('Periods') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('periods.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
                        </div>
                    </div>

                     <!-- Recherche -->
                     <div class="py-1 bg-gray-100">
                        <div class="max-w-full mx-auto sm:px-1 lg:px-1 space-y-6">
                            <div class="p-1 sm:p-1 bg-white shadow sm:rounded-lg">
                                <div class="w-full">
                                    <form method="GET" action="{{ route('periods.index') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf
                                            <input type="text" name="search"  placeholder=" search a period...." value="{{ request('search') }}">
                                            <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-4 py-2 text-white">{{ __('Search') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($periods as $period)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $period->name }}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('periods.edit', $period->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form action="{{ route('periods.destroy', $period->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('importPeriod') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-span-full">
                            <label for="file-upload" class="block text-sm font-medium leading-6 text-gray-900">Import Excel File</label>
                            <div id="file-upload-area" class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="flex items-center justify-center w-full">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg id="file-icon" class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p id="upload-text" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p id="file-name" class="text-xs text-gray-500 dark:text-gray-400">XLSX, XLS, CSV up to 10MB</p>
                                        </div>
                                        <input id="file-upload" name="file" type="file" accept=".xlsx,.xls,.csv" class="sr-only" onchange="handleFileUpload(event)">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-4 py-2 text-white">Import</button>
                    </form>

                    <script>
                    function handleFileUpload(event) {
                        const fileInput = event.target;
                        const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : '';

                        const fileNameElement = document.getElementById('file-name');
                        const uploadTextElement = document.getElementById('upload-text');
                        const fileIcon = document.getElementById('file-icon');

                        if (fileName) {
                            fileNameElement.textContent = fileName;
                            uploadTextElement.textContent = 'File selected:';
                            fileIcon.classList.add('text-green-500');
                        } else {
                            fileNameElement.textContent = 'XLSX, XLS, CSV up to 10MB';
                            uploadTextElement.textContent = 'Click to upload or drag and drop';
                            fileIcon.classList.remove('text-green-500');
                        }
                    }
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
