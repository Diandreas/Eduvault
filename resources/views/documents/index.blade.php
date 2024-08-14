<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of') }} Cours
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

                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a  href="{{ route('documents.create') }}"  class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            Add New Document
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Path') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Format') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Size') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('create_at') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Cours') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('School') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $doc)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $doc->name }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $doc->path }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $doc->format }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $doc->size }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $doc->created_at }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $doc->cours->name }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $doc->school->name }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">

                                            <!-- Delete Button -->
                                            <form action="{{ route('documents.destroy', $doc->id) }}" method="POST"  >
                                                @csrf
                                                    <!-- Update Button -->
                                                <a href="{{ route('documents.edit', $doc->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">
                                                    {{ __('Update') }}
                                                </a>
                                                <!-- Delete Button -->
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 font-bold hover:text-red-900">
                                                    {{ __('Delete') }}
                                                </button>
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
