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

                    <form action="{{ route('cours.store') }}" method="POST">
                        @csrf

                        <div class="block mt-4">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="block mt-1 w-full" id="name" name="name" value="{{ old('name') }}" placeholder="Example:Introduction to Programming" required>
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea class="block mt-1 w-full" id="description" name="description" placeholder="example:Learn the basics of programming using Python.">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="parent_id">{{ __('Parent ID') }}</label>
                            <input type="number" class="block mt-1 w-full" id="parent_id" name="parent_id" value="{{ old('parent_id') }}">
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ __('Submit') }}
                            </button>
                        </div>
                        
                    </form>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a  href="{{ route('cours.index') }}"  class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            Show all cours
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>