<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                                    {{ __('Created At') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Cours') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('School') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Grade') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Period') }}
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
                                        {{ $doc->course->name }}
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        {{ $doc->school->name }}
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        {{ $doc->grade->name }}
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        {{ $doc->period->name }}
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
