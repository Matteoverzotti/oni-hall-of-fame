<x-layout>
    <h1
        class="mb-4 text-6xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-6xl lg:text-6xl dark:text-white">
        Adăugare concurs
    </h1>

    <form method="POST" action="/contests">
        @csrf
        <div class="px-64 flex justify-center">

            {{-- Nume concurs --}}
            <div class="w-1/3 mb-6">
                <x-input label="Nume concurs" name="name" value="{{ old('name') }}"/>
                @error('name')
                <x-error-message :name="old('name')"/> @enderror
            </div>

            @if (session('error'))
                <div class="text-red-500 text-xs mt-1">{{ session('error') }}</div>
            @endif

            {{-- Locație concurs --}}
            <div class="w-1/3 mb-6">
                <x-input label="Locație concurs" name="location" value="{{  old('location') }}"/>
                @error('location')
                <x-error-message :name="old('location')"/> @enderror
            </div>

            {{-- Dată Concurs --}}
            <div class="w-1/3 mb-6">
                <x-input label="Dată Concurs" name="date" value="{{ old('date') }}" placeholder="Format: YYYY-MM-DD"/>
                @error('date')
                <x-error-message :name="old('date')"/> @enderror
            </div>
        </div>

        <div class="px-64 flex justify-center">
            <div class="flex items-center mr-2">
                <input id="default-radio-1" type="radio" value="national" name="region" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Concurs Național</label>
            </div>
            <div class="flex items-center">
                <input checked id="default-radio-2" type="radio" value="international" name="region" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Concurs Internațional</label>
            </div>
        </div>

        <div id="subcontests"></div>
        @error('subcontests')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <button type="button" id="add-subcontest-button" class="blue-button">Add a New Subcontest</button>

        <div class="mb-6">
            <button type="submit"
                    class="blue-button">
                Submit
            </button>
        </div>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const subcontestsContainer = document.getElementById('subcontests');
            const addSubcontestButton = document.getElementById('add-subcontest-button');
            let subcontestCount = 0;

            addSubcontestButton.addEventListener('click', function () {
                ++subcontestCount;

                const subcontestInput = document.createElement('div');
                subcontestInput.innerHTML = `
                <x-input label="Subcontest ${subcontestCount} name" name="subcontests[]" value=""/>
            `;
                subcontestsContainer.appendChild(subcontestInput);

            });
        });
    </script>
</x-layout>
