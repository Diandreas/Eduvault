<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('List of') }} Cours
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="sm:flex sm:items-center sm:justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">{{ __('Manage Documents') }}</h3>
                        <a href="{{ route('documents.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Add New Document
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($documents as $doc)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-6">
                                    <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $doc->name }}</h4>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Path:</span> {{ $doc->path }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Format:</span> {{ $doc->format }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Size:</span> {{ $doc->size }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Created:</span> {{ $doc->created_at->format('Y-m-d H:i') }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Course:</span> {{ $doc->course->name }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">School:</span> {{ $doc->school->name }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Grade:</span> {{ $doc->grade->name }}</p>
                                    <p class="text-sm text-gray-600 mb-4"><span class="font-medium">Period:</span> {{ $doc->period->name }}</p>

                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('documents.show', $doc->id) }}" class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-md text-sm font-medium hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            View
                                        </a>
                                        <a href="{{ route('documents.edit', $doc->id) }}" class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-sm font-medium hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Edit
                                        </a>
                                        <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-md text-sm font-medium hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this document?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
