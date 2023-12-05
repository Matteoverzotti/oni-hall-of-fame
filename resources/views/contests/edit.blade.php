@include('partials._navbar')

<h1
    class="mb-4 text-6xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-6xl lg:text-6xl dark:text-white">
    Editare concurs
</h1>

<form method="POST" action="/contest/{{ $contest->name_id }}">
    @csrf
    @method('PUT')
    <div class="px-64 flex justify-center">
        <div class="w-1/3 mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nume
                concurs</label>
            <input type="text" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $contest->name }}" required>
        </div>

        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        @if (session('error'))
            <div class="text-red-500 text-xs mt-1">{{ session('error') }}</div>
        @endif

        <br>

        <div class="w-1/3 mb-6">
            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Locație
                concurs</label>
            <input type="text" name="location"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-10% p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $contest->location }}" required>
        </div>

        @error('location')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <br>

        <div class="w-1/3 mb-6">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dată
                concurs</label>
            <input type="text" name="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-10% p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $contest->date }}" placeholder="Format: YYYY-MM-DD" required>
        </div>

        @error('date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <br>
    <br>
    <br>

    <div id="subcontests">    
        @foreach ($contest->subContests as $sub_contest)
        <label>Subcontest {{ $loop->iteration }} name</label>
        <input type="text" name="subcontests[]" value="{{ $sub_contest->name }}">
        <br>
        @endforeach

    </div>
    @error('subcontests')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror

    <button type="button" id="add-subcontest-button">Add a New Subcontest</button>

    <div class="mb-6">
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subcontestsContainer = document.getElementById('subcontests');
        const addSubcontestButton = document.getElementById('add-subcontest-button');

        let subcontestCount = {{ $contest->subContests->count() }};

        addSubcontestButton.addEventListener('click', function() {
            ++subcontestCount;

            const subcontestLabel = document.createElement('label');
            subcontestLabel.textContent = `Subcontest ${subcontestCount} name`;
            
            const subcontestInput = document.createElement('input');
            subcontestInput.setAttribute('type', 'text');
            subcontestInput.setAttribute('name', 'subcontests[]');
            
            
            const lineBreak = document.createElement('br');
            
            subcontestsContainer.appendChild(subcontestLabel);
            subcontestsContainer.appendChild(subcontestInput);
            subcontestsContainer.appendChild(lineBreak);
        });
    });
</script>
