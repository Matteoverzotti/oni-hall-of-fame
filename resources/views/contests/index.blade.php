<x-layout>
    <h2>Concursuri</h2>

    @if (count($contests) == 0)
        <h2>Nu s-au găsit concursuri!</h2>
    @else
        <div class="relative mx-auto w-3/4 overflow-x-auto shadow-md sm:rounded-lg rankingTable">
            <table>
                <thead>
                <tr>
                    <th>Nume</th>
                    <th>Locație</th>
                    <th>Dată</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contests as $contest)
                    <tr>
                        <td><a
                                href="{{ route('contests.show', ['name_id' => $contest->name_id]) }}">{{ $contest->name }}</a>
                        </td>
                        <td>{{ $contest->location }}</td>
                        <td>{{ $contest->date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <br>
    <br>
    <br>
    <br>
    <br>

    <a href="{{ route('contests.create') }}">
        <button class="blue-button">Creează concurs</button>
    </a>
</x-layout>
