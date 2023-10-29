@include('partials._navbar')

<h2
    class="mb-4 text-6xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-6xl lg:text-6xl dark:text-white">
    Concursuri
</h2>

@if (count($contests) == 0)
    <h2
        class="mb-4 text-5xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-5xl dark:text-white">
        Nu s-au găsit concursuri!
    </h2>
@else
        <div class="relative mx-auto w-3/4 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <x-th>
                        Nume
                    </x-th>
                    <x-th>
                        <div class="flex items-center">
                            Locație
                        </div>
                    </x-th>
                    <x-th>
                        <div class="flex items-center">Dată</div>
                    </x-th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contests as $contest)
                <x-tr>
                    <x-td><a
                        href="{{ route('contests.show', ['name_id' => $contest->name_id]) }}">{{ $contest->name }}</a></x-td>
                        <x-td>{{ $contest->location }}</x-td>
                        <x-td>{{ $contest->date }}</x-td>
                    </x-tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<br>
<br>
<br>
<br>
<br>

<a href="/contests/create">Create contest</a>
