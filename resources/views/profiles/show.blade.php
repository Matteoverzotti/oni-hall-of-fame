<x-layout>
    <h1>{{ $profile->name }}</h1>

    @php
        $nationalRanking = [];
        $internationalRanking = [];
        $allSubs = App\Models\SubContest::find($profile->contestants()->get('sub_contest_id'));

        foreach ($allSubs as $sub) {
            $contest = App\Models\Contest::find($sub->contest_id);
            if ($contest->international == 0)
                $nationalRanking[] = $sub;
            else
                $internationalRanking[] = $sub;
        }
    @endphp

    @unless(empty($nationalRanking))
        <h2>Concursuri naționale</h2>
        <div class="relative mx-auto w-3/4 overflow-x-auto shadow-md sm:rounded-lg rankingTable">
            <table>
                <thead>
                <tr>
                    <th>Competiție</th>
                    <th>Loc</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($nationalRanking as $participation)
                    @php
                        $contest = $participation->contest()->first();
                        $contestant = $participation->contestants->where('profile_id', $profile->id)->first();
                    @endphp
                    <tr>
                        <td>
                            <a href="{{ route('sub_contests.show', ['name_id' => $contest->name_id, 'sub_contest_name_id' => $participation->name_id]) }}">
                                {{ $participation->name }}</a></td>
                        <td>{{$contestant->place}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endunless

    @unless(empty($internationalRanking))
        <h2>Concursuri internaționale</h2>
        <div class="relative mx-auto w-3/4 overflow-x-auto shadow-md sm:rounded-lg rankingTable">
            <table>
                <thead>
                <tr>
                    <th>Competiție</th>
                    <th>Loc</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($internationalRanking as $participation)
                    @php
                        $contest = $participation->contest()->first();
                        $contestant = $participation->contestants->where('profile_id', $profile->id)->first();
                    @endphp
                    <tr>
                        <td>
                            <a href="{{ route('sub_contests.show', ['name_id' => $contest->name_id, 'sub_contest_name_id' => $participation->name_id]) }}">
                                {{ $participation->name }}</a></td>
                        <td>{{$contestant->place}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endunless
</x-layout>
