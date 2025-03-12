<div class="container mx-auto rounded">


    <form wire:submit.prevent="submit">
        {{-- Title Field --}}
        <div class="mb-4">
            <h2>{{ $form['title'] ?? 'Default Title' }}</h2>
        </div>

        {{-- Loop through dynamic form fields --}}
        @foreach ($form['fields'] ?? [] as $field)
            <div class="mb-3 rounded">
                <label class="block text-gray-600">{{ $field['field_title'] }}</label>
                <input 
                    type="text" 
                    wire:model="answers.{{ $field['field_title'] }}" 
                    class="w-full p-2 border border-gray-300 "
                >
            </div>
        @endforeach

        {{-- Static fields (first name, last name, email, phone) --}}
        @foreach (['first_name' => 'First name', 'last_name' => 'Last name', 'email' => 'Email', 'phone' => 'Phone'] as $fieldName => $label)
            <div class="mb-3">
                <label class="block text-gray-600">{{ $label }}</label>
                <input 
                    type="text" 
                    wire:model="{{ $fieldName }}" 
                    class="w-full p-2 border border-gray-300 "
                >
            </div>
        @endforeach

        <button type="submit" class=" mb-3 bg-blue-500 text-white px-4 py-2 "
        
        >Save Form</button>

        @if (session()->has('success'))
        <div class="bg-green-500 text-white p-3 mb-3 ">
            {{ session('success') }}
        </div>
    @endif
    </form>
</div>
