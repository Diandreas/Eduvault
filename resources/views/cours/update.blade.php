<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('cours.update', $cours->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="block mt-1 w-full" id="name" name="name" value="{{ $cours->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea class="block mt-1 w-full" id="description" name="description">{{ $cours->description }}</textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label for="description">{{ __('Parent_id') }}</label>
                            <textarea class="form-control" id="parent_id" name="parent_id">{{ $cours->parent_id }}</textarea>
                        </div> -->

                        <button type="submit" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-4">
                            {{ __('Update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
