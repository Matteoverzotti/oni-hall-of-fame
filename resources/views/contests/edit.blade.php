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
                <x-input label="Subcontest {{ $loop->iteration }} name" name="subcontests[]"
                         :value="$sub_contest->name"/>
            @endforeach
        </div>
        @error('subcontests')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <button type="button" id="add-subcontest-button" class="mb-4 text-blue-700">Add a New Subcontest</button>

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
            let subcontestCount = {{ $contest->subContests->count() }};

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
