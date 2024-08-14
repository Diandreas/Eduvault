<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Course Hierarchy') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Course Organigram</h3>
                <a href="{{ route('courses.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Create New Course+
                </a>
                <div class="course-tree">
                    <ul>
                        @foreach($parentCourses as $course)
                            @include('courses.course_tree_item', ['course' => $course])
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .course-tree, .course-tree ul {
            list-style-type: none;
            padding-left: 20px;
        }
        .course-tree li {
            position: relative;
            margin-bottom: 10px;
        }
        .course-tree li::before {
            content: "";
            position: absolute;
            top: 0;
            left: -15px;
            border-left: 1px solid #ccc;
            height: 100%;
        }
        .course-tree li:last-child::before {
            height: 20px;
        }
        .course-tree li::after {
            content: "";
            position: absolute;
            top: 20px;
            left: -15px;
            border-top: 1px solid #ccc;
            width: 15px;
        }
        .course-item {
            border: 1px solid #e2e8f0;
            padding: 10px;
            border-radius: 4px;
            background-color: #f8fafc;
            display: inline-block;
            min-width: 200px;
        }
        .course-item:hover {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .toggle-children {
            cursor: pointer;
            color: #4a5568;
            margin-right: 5px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-children').forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    var children = this.parentElement.nextElementSibling;
                    if (children) {
                        children.style.display = children.style.display === 'none' ? 'block' : 'none';
                        this.textContent = children.style.display === 'none' ? '▶' : '▼';
                    }
                });
            });
        });
    </script>
</x-app-layout>
