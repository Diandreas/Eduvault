<!-- resources/views/courses/form.blade.php -->
<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <div class="mt-1">
            <input id="name" name="name" type="text" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" value="{{ old('name', isset($course) ? $course->name : '') }}">
        </div>
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <div class="mt-1">
            <textarea id="description" name="description" rows="3" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">{{ old('description', isset($course) ? $course->description : '') }}</textarea>
        </div>
    </div>

    <div>
        <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Course</label>
        <div class="mt-1">
            <select id="parent_id" name="parent_id" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="">None</option>
                @foreach ($courses as $parentCourse)
                    <option value="{{ $parentCourse->id }}" {{ old('parent_id', isset($course) ? $course->parent_id : '') == $parentCourse->id ? 'selected' : '' }}>{{ $parentCourse->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div>
        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
    </div>
</div>
