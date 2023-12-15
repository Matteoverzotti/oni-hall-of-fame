@include('partials._navbar')

<h2>{{ $sub_contest->name }}</h2>
<p>{{ $sub_contest->location }}</p>
<p>{{ $sub_contest->date }}</p>

@php
    $rankingJson = $sub_contest->rankings()->get()->first()->data;
    $rankingArray = json_decode($rankingJson, true);
@endphp

<h2>Participants</h2>
<table>
    <thead>
    <x-tr>
        @foreach($rankingArray[0] as $headerCol)
            <x-th>{{ $headerCol }}</x-th>
        @endforeach
    </x-tr>
    </thead>
    <tbody>
    @foreach($rankingArray as $line => $value)
        @if ($line == 0)
            @continue
        @endif
        <x-tr>
            @foreach($value as $col)
                <x-td>{{ $col }}</x-td>
            @endforeach
        </x-tr>
    @endforeach
{{--        @foreach ($sub_contest->contestants as $contestant)--}}
{{--            <x-tr>--}}
{{--                <x-td>{{$contestant->place}}</x-td>--}}
{{--                <x-td><a href="{{ route('profiles.show', ['id' => $contestant->profile_id]) }}">{{ $contestant->name }}</x-td>--}}
{{--                <x-td>{{$contestant->team}}</x-td>--}}
{{--                <x-td>{{$contestant->region}}</x-td>--}}
{{--                <x-td>{{$contestant->medal}}</x-td>--}}
{{--                <x-td>{{$contestant->prize}}</x-td>--}}
{{--            </x-tr>--}}
{{--        @endforeach--}}
    </tbody>
</table>

<div class="mb-6">
    <a href="{{ route('sub_contests.edit', ['name_id' => $contest->name_id, 'sub_contest_name_id' => $sub_contest->name_id]) }}">
        <x-button type="Edit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit sub-contest
        </x-button>
    </a>
</div>

<form method="POST" action="/contest/{{ $contest->name_id }}/{{ $sub_contest->name_id }}">
    @csrf
    @method('DELETE')
    <x-button type="submit"
              class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              onclick="return confirm('Are you sure you want to delete this subcontest?')">
        Delete sub-contest
    </x-button>
</form>
