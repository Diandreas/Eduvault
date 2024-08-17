<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#searchModal">
                        {{ __('Open Search') }}
                    </button>

                    <!-- The Modal -->
                    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="searchModalLabel">{{ __('Document Search') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('documents.search') }}" method="GET">
                                        <div class="mb-4">
                                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Document Name') }}</label>
                                            <input type="text" id="name" name="name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>

                                        <div class="mb-4">
                                            <label for="course_id" class="block text-sm font-medium text-gray-700">{{ __('Course') }}</label>
                                            <select id="course_id" name="course_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">{{ __('All Courses') }}</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="school_id" class="block text-sm font-medium text-gray-700">{{ __('School') }}</label>
                                            <select id="school_id" name="school_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">{{ __('All Schools') }}</option>
                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="period_id" class="block text-sm font-medium text-gray-700">{{ __('Period') }}</label>
                                            <select id="period_id" name="period_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">{{ __('All Periods') }}</option>
                                                @foreach ($periods as $period)
                                                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="grade_id" class="block text-sm font-medium text-gray-700">{{ __('Grade') }}</label>
                                            <select id="grade_id" name="grade_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">{{ __('All Grades') }}</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="flex items-center justify-end">
                                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Search') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Document List -->
                    <div class="overflow-x-auto mt-4">
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

    <script>
        $(document).ready(function() {
            // Fonction de recherche pour chaque sélecteur
            $('#course_id, #school_id, #period_id, #grade_id').each(function() {
                $(this).select2({
                    placeholder: "Select an option",
                    allowClear: true
                });
            });
        });
    </script>
</x-app-layout>
