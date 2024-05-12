<x-layout>
    <h1 class="mb-4 text-6xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-6xl lg:text-6xl dark:text-white">
        Editare {{ $contest->name }}
    </h1>

    <form method="POST" action="/contest/{{ $contest->name_id }}">
        @csrf
        @method('PUT')

        <div class="px-64 flex justify-center">
            {{-- Nume concurs --}}
            <div class="w-1/3 mb-6">
                <x-input label="Nume concurs" name="name" :value="$contest->name"/>
                @error('name')
                <x-error-message :name="$contest->name"/> @enderror
            </div>

            {{-- Locație concurs --}}
            <div class="w-1/3 mb-6">
                <x-input label="Locație concurs" name="location" :value="$contest->location"/>
                @error('location')
                <x-error-message :name="$contest->location"/> @enderror
            </div>

            {{-- Dată Concurs --}}
            <div class="w-1/3 mb-6">
                <x-input label="Dată Concurs" name="date" :value="$contest->date" placeholder="Format: YYYY-MM-DD"/>
                @error('date')
                <x-error-message :name="$contest->date"/> @enderror
            </div>
        </div>

        <div class="px-64 flex justify-center">
            <div class="flex items-center mr-2">
                <input @if(!$contest->international) checked @endif id="default-radio-1" type="radio" value="national" name="region" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Concurs Național</label>
            </div>
            <div class="flex items-center">
                <input @if($contest->international) checked @endif id="default-radio-2" type="radio" value="international" name="region" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Concurs Internațional</label>
            </div>
        </div>

        <div id="subcontests">
        @foreach ($contest->subContests as $sub_contest)
            <div class="subcontest-field flex items-center justify-center">
                <input type="text" name="subcontests[]" value="{{ $sub_contest->name }}" readonly
                       class="mt-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        @endforeach
        </div>
        @error('subcontests')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <div class="px-64 flex justify-center mt-12">
            <button type="button" id="add-subcontest-button" class="blue-button">Adaugă o nouă grupă</button>
        </div>
        
        <div class="px-64 flex justify-center mt-12 pb-16 relative">
            <div class="absolute bottom-0 left-0 right-0 flex justify-center">
                <button type="submit" class="blue-button">Submit</button>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const subcontestsContainer = document.getElementById('subcontests');
            const addSubcontestButton = document.getElementById('add-subcontest-button');

            addSubcontestButton.addEventListener('click', function () {
                const subcontestDiv = document.createElement('div');
                subcontestDiv.className = 'subcontest-field flex items-center justify-center';

                // Create x-input element inside the div
                const subcontestInput = document.createElement('input');
                subcontestInput.type = 'text';
                subcontestInput.name = 'subcontests[]';
                subcontestInput.placeholder = 'Nume grupă (ex. Juniori/Clasa a 5-a)';
                subcontestInput.className = 'mt-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
                subcontestInput.required = true;

                const deleteButton = document.createElement('button');
                deleteButton.className = 'red-button mt-6 ml-2';
                deleteButton.innerText = 'X';
                deleteButton.addEventListener('click', function () {
                    subcontestDiv.remove();
                });

                subcontestDiv.appendChild(subcontestInput);
                subcontestDiv.appendChild(deleteButton);
                subcontestsContainer.appendChild(subcontestDiv);
            });
        });
    </script>
</x-layout>
