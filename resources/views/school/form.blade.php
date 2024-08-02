<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Section de droite : Champ de téléchargement et prévisualisation -->
    <div class="flex flex-col items-center justify-center bg-gray-100 p-6 rounded-lg shadow-inner">
        <div class="mb-4 w-full">
            <x-input-label for="image" :value="__('School Image')" />
            <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white p-2" accept="image/*" onchange="previewImage(event)">
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div class="mt-4 w-full flex justify-center">
            <img id="imagePreview" src="{{ old('image', $school?->image ? asset('storage/' . $school->image) : 'https://via.placeholder.com/300x200.png?text=School+Image') }}" alt="Image Preview" class="max-w-full h-auto rounded-lg shadow-md">
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        const reader = new FileReader();

        reader.onload = function() {
            preview.src = reader.result;
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
    <!-- Section de gauche : Champs du formulaire -->
    <div class="space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $school?->name)" autocomplete="name" placeholder="Name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" name="description" class="mt-1 block w-full" :value="old('description', $school?->description)" placeholder="Description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label for="country_id" :value="__('Country')" />
            <select id="country_id" name="country_id" class="mt-1 block w-full">
                <option value="">{{ __('Select Country') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id', $school?->country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('country_id')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Submit</x-primary-button>
        </div>
    </div>


