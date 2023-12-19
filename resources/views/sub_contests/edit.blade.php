@include('partials._navbar')

<h1>Editare {{ $sub_contest->name }} din {{ $contest->name }}</h1>

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

    <div class="px-64 flex justify-center">
         File Upload
        <input type="file" name="ranking" accept=".csv" id="ranking" onchange="previewCSV()">
    </div>

    <!-- Display CSV preview -->
{{--    TODO: Make it consistent with table component--}}
    <div id="rankingPreview" class="px-64 mb-6"></div>

    <div class="mb-6">
        <x-button type="submit"
                  class="blue-button">
            Submit
        </x-button>
    </div>
</form>

<script>
    function previewCSV() {
        const fileInput = document.getElementById('ranking');
        const previewContainer = document.getElementById('rankingPreview');

        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const csvContent = e.target.result;
                const csvRows = csvContent.split(/\r\n|\n/);
                const headers = csvRows[0].split(',');

                const table = document.createElement('table');
                table.classList.add('table', 'border', 'border-collapse', 'w-full');

                // Create table headers
                const headerRow = document.createElement('tr');
                headers.forEach(header => {
                    const th = document.createElement('th');
                    th.textContent = header;
                    headerRow.appendChild(th);
                });
                table.appendChild(headerRow);

                // Create table rows
                for (let i = 1; i < csvRows.length; i++) {
                    const row = document.createElement('tr');
                    const columns = csvRows[i].split(',');

                    columns.forEach(column => {
                        const td = document.createElement('td');
                        td.textContent = column;
                        row.appendChild(td);
                    });

                    table.appendChild(row);
                }

                previewContainer.innerHTML = '<strong>Ranking Preview:</strong><br>';
                previewContainer.appendChild(table);
            };

            reader.readAsText(file);
        } else {
            previewContainer.innerHTML = ''; // Clear the preview if no file selected
        }
    }
</script>
