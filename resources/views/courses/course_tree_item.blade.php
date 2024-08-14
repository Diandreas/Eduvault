<li>
    <div class="course-item">
        @if($course->children->isNotEmpty())
            <span class="toggle-children">▼</span>
        @endif
        {{ $course->name }}
        <div class="text-sm text-gray-500">{{ Str::limit($course->description, 50) }}</div>
    </div>
    @if($course->children->isNotEmpty())
        <ul>
            @foreach($course->children as $childCourse)
                @include('courses.course_tree_item', ['course' => $childCourse])
            @endforeach
        </ul>
    @endif
</li>
