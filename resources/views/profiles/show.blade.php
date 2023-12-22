<x-layout>
    <h1>{{ $profile->name }}</h1>
    <p>Graduation Year: {{ $profile->graduation_year }}</p>

    <div class="rankingTable">
        <table>
            <thead>
            <tr>
                <th>Competiție</th>
                <th>Loc</th>
                <th>Medalie</th>
                <th>Premiu</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($profile->contestants as $participation)
                @php
                    $sub_contest = App\Models\SubContest::find($participation->sub_contest_id);
                    $contest = App\Models\Contest::find($sub_contest->contest_id);
                    $contestant = $sub_contest->contestants->where('profile_id', $profile->id)->first();
                @endphp
                <tr>
                    <td><a
                            href="{{ route('sub_contests.show', ['name_id' => $contest->name_id, 'sub_contest_name_id' => $sub_contest->name_id]) }}">
                            {{ $sub_contest->name }}</a></td>
                    <td>{{$contestant->place}}</td>
                    <td>{{$contestant->medal}}</td>
                    <td>{{$contestant->prize}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
