@include('partials._navbar')

<h1 class="mb-4 text-6xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-6xl lg:text-6xl dark:text-white">
    Editare {{ $sub_contest->name }} din {{ $contest->name }}
</h1>

<form method="POST" action="/contest/{{ $contest->name_id }}/{{ $sub_contest->name_id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="px-64 flex justify-center">
        {{-- Nume subconcurs --}}
        <div class="w-1/3 mb-6">
            <x-input label="Nume subconcurs" name="name" :value="$sub_contest->name"/>
            @error('name')
            <x-error-message :name="$sub_contest->name"/> @enderror
        </div>
    </div>

{{--    <div class="px-64 flex justify-center">--}}
{{--        --}}{{-- File Upload --}}
{{--        <input type="file" name="csvFile" accept=".csv">--}}
{{--    </div>--}}

    <div class="mb-6">
        <x-button type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </x-button>
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
