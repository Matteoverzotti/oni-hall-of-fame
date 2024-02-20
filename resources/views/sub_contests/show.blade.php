<x-layout>
    <div
        class="flex flex-col items-center mb-6 text-lg text-center font-normal text-gray-700 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
        <h2>{{ $sub_contest->name }}</h2>
        <table>
            <tbody>
            <tr>
                <td>Locație:</td>
                <td>{{ $sub_contest->location }}</td>
            </tr>
            <tr>
                <td>Dată:</td>
                <td>{{ date('d/m/Y', strtotime($sub_contest->date)) }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="px-64">
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
            @php($contestants = $sub_contest->contestants()->get())

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
                        @unless($line == 0)
                        <tr>
                            @foreach($value as $col => $_value)
                                @if ($col == 0)
                                    <td>
                                        <a href="{{ route('profiles.show', ['id' => $contestants[$line]->profile_id]) }}">
                                            {{ $_value }}
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $_value }}</td>
                                @endif
                            @endforeach
                        </tr>
                        @endunless
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endunless

        <div class="flex space-x-4 mt-5">
            <a href="{{ route('sub_contests.edit', ['name_id' => $contest->name_id, 'sub_contest_name_id' => $sub_contest->name_id]) }}">
                <button type="button"
                        class="blue-button">
                    Edit sub-contest
                </button>
            </a>

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
    </div>
</x-layout>
