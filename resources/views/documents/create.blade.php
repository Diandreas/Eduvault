<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }} Cours
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('documents.store') }}" method="POST">
                        @csrf

                        <div class="block mt-4">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="block mt-1 w-full" id="name" name="name" value="{{ old('name') }}"  required>
                        </div>

                        <div class="block mt-4">
                            <label for="file">{{ __('Upload File') }}</label>
                            <input type="file" class="block mt-1 w-full" id="file" name="file" required readonly>
                        </div>

                        <div class="block mt-4">
                            <label for="name">{{ __('Path') }}</label>
                            <input type="text" class="block mt-1 w-full" id="path" name="path" value="{{ old('path') }}"  required readonly>
                        </div>

                        <div class="block mt-4">
                            <label for="name">{{ __('Format') }}</label>
                            <input type="text" class="block mt-1 w-full" id="format" name="format" value="{{ old('format') }}"  required readonly>
                        </div>

                        <div class="block mt-4">
                            <label for="name">{{ __('size') }}</label>
                            <input type="text" class="block mt-1 w-full" id="size" name="size" value="{{ old('size') }}"  required readonly>
                        </div>

                        <!-- <div class="block mt-4">
                            <label for="name">{{ __('DateTime') }}</label>
                            <input type="datetime-local" class="block mt-1 w-full" id="create_at" name="create_at" value="{{ date('Y-m-d\TH:i') }}" readonly>
                        </div> -->

                        <div class="form-group">
                            <label for="cours_id">{{ __('Cours') }}</label>
                            <select class="block mt-1 w-full" id="cours_id" name="cours_id" >
                                @foreach ($courses as $cours)
                                    <option value="{{$cours->id}}" {{ (old('cours_id') == $cours->id) ? 'selected' : '' }}>
                                        {{$cours->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="school_id">{{ __('School') }}</label>
                            <select class="block mt-1 w-full" id="school_id" name="schools_id" >
                                @foreach ($schools as $school)
                                    <option value="{{$school->id}}" {{ (old('schools_id') == $schools->id) ? 'selected' : '' }}>
                                        {{$school->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ __('Submit') }}
                            </button>
                        </div>

                    </form>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a  href="{{ route('documents.index') }}"  class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            Back
                        </a>
                    </div>
                    <script>
                        document.getElementById('file').addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const fileName = file.name;
                                const fileSize = (file.size / 1024).toFixed(2); // Taille en Ko
                                const fileFormat = fileName.split('.').pop(); // Extraction du format du fichier

                                document.getElementById('path').value = fileName;
                                document.getElementById('size').value = `${fileSize} KB`;
                                document.getElementById('format').value = fileFormat;
                            } else {
                                document.getElementById('path').value = '';
                                document.getElementById('size').value = '';
                                document.getElementById('format').value = '';
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
