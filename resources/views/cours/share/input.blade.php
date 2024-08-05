@php
    $label ??= null;
    $type ??= "text";
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(['form-group', $class])>
    <label for="{{$name}}">{{$label}}</label>
    @if ($type === 'textarea')
    <textarea class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="{{$name}}" name="{{$name}}" cols="30" rows="10">{{old($name, $value)}}</textarea>
    @else
    <input type="text" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="{{$name}}" name="{{$name}}" value="{{old($name, $value)}}" required>
    @endif

    @error($name)
        <div>
            {{ $message }}
        </div>
    @enderror
</div>
