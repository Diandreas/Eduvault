<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$course->exists? "update course" : "create course"}}
        </h2>
    </x-slot>

<form action="{{route($course->exists? "cours.update" : "cours.store", $course)}}" method="post">
    @csrf
    @method($course->exists? "put" : "post")
    <div class="bg-red-600">
        @foreach ($errors->all() as $error)
            <li class="">{{$error}}</li>
        @endforeach
    </div>

     
    @include('cours/share.input', ['label' => 'Course name', 'name'=>'name', 'value'=>$course->name])
    @include('cours/share.input', ['type' => 'textarea', 'label' => 'Description', 'name'=>'description', 'value'=>$course->description])

    <div class="form-group">
        <label for="parent_id">parent course: </label>
        <select name='parent_course_id' id="parent_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        @foreach ($parentCourse as $parent)
            <option value="{{$parent->id}}" {{$parent->id ===$course->parentCourse?->id ? "selected" : "" }}> {{ $parent->name }} </option>
        @endforeach
    </select>
    </div class="my-2">
    <button type="submit" class="b hover:bg-blue-400 text-black font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        {{ $course->exists? "update" : "create"}}
      </button>

</form>
</x-app-layout>

    
