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

                    @if(session('success'))
                        <div class="alert alert-success bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                            <p class="font-bold">{{ session('success') }}</p>
                        </div>
                    @endif

                   <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Description') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Parent_id') }}
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allcours as $cours)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $cours->name }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $cours->description }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $cours->parent_id }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                           
                                            <!-- Delete Button -->
                                            <form action="{{ route('cours.destroy', $cours->id) }}" method="POST"  >
                                                @csrf
                                                    <!-- Update Button -->
                                                <a href="{{ route('cours.edit', $cours->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">
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