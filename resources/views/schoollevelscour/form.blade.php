<div class="space-y-6">

    <div>
        <x-input-label for="schoollevel_id" :value="__('Schoollevel Id')"/>
        <select id="schoollevel_id" name="schoollevel_id" class="mt-1 block w-full">
            <option value="">{{ __('Select Schoollevel') }}</option>
            @foreach($schoollevels as $schoollevel)
                <option value="{{ $schoollevel->id }}" {{ old('schoollevel_id', $schoollevelscour?->schoollevel_id) == $schoollevel->id ? 'selected' : '' }}>
                    {{ $schoollevel->name }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('schoollevel_id')"/>
    </div>

    <div>
        <x-input-label for="cours_id" :value="__('Cours Id')"/>
        <select id="cours_id" name="cours_id" class="mt-1 block w-full">
            <option value="">{{ __('Select Course') }}</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ old('cours_id', $schoollevelscour?->cours_id) == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('cours_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
