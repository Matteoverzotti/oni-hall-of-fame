<x-layout>
    <h2>{{ $contest->name }}</h2>
    <div
        class="flex flex-col items-center mb-6 text-lg text-center font-normal text-gray-700 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
        <table>
            <tbody>
            <tr>
                <td>Locație:</td>
                <td>{{ $contest->location }}</td>
            </tr>
            <tr>
                <td>Dată:</td>
                <td>{{ $contest->date }}</td>
            </tr>
            <tr>
                <td>SubContests:</td>
                <td>
                    <ul>
                        @foreach ($contest->subContests as $sub_contest)
                            <li>
                                <a href="{{ route('sub_contests.show', [
                                    'name_id' => $contest->name_id,
                                    'sub_contest_name_id' => $sub_contest->name_id,
                                ]) }}">
                                    {{ $sub_contest->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="flex space-x-4 mt-5">
            <a href="/contest/{{ $contest->name_id }}/edit">
                <button class="blue-button" type="button">Editează concurs</button>
            </a>

            <form method="POST" action="/contest/{{ $contest->name_id }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="red-button"
                        onclick="return confirm('Are you sure you want to delete this contest?')">
                    Delete contest
                </button>
            </form>
        </div>
    </div>
</x-layout>
