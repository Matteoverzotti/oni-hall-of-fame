<x-layout>
    <div class="px-64">
        <h2>{{ $sub_contest->name }}</h2>
        <p>{{ $sub_contest->location }}</p>
        <p>{{ $sub_contest->date }}</p>

        @php
            $rankingArray = [];
            $rankings = $sub_contest->rankings()->first();

            if (!$rankings) {
                echo "<h2>No rankings available</h2>";
            } else {
                $rankingArray = json_decode($rankings->data, true);
            }
        @endphp

        @unless(empty($rankingArray))
            <h2>Ranking</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg rankingTable">

                <table>
                    <thead>
                    <tr>
                        @foreach($rankingArray[0] as $headerCol)
                            <th>{{ $headerCol }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rankingArray as $line => $value)
                        @if ($line == 0)
                            @continue
                        @endif
                        <tr>
                            @foreach($value as $col)
                                <td>{{ $col }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endunless

        <div class="mb-6">
            <a href="{{ route('sub_contests.edit', ['name_id' => $contest->name_id, 'sub_contest_name_id' => $sub_contest->name_id]) }}">
                <button type="button"
                        class="blue-button">
                    Edit sub-contest
                </button>
            </a>
        </div>

        <form method="POST" action="/contest/{{ $contest->name_id }}/{{ $sub_contest->name_id }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="red-button"
                    onclick="return confirm('Are you sure you want to delete this subcontest?')">
                Delete sub-contest
            </button>
        </form>
    </div>
</x-layout>
