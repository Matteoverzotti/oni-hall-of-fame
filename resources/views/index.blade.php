<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEPI Hall Of Fame</title>
</head>

<body>
<x-layout>
    <h1>Bine ai venit la SEPI Hall Of Fame!</h1>
    <div class="flex flex-col items-center">
        {{-- Two columns div --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 p-36">
            {{-- First column --}}
            <div>
                <p
                    class="mb-6 text-lg text-center font-normal text-gray-700 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Ce este <em>SEPI Hall Of Fame?</em>
                </p>
                <p class="mb-3 text-gray-700 dark:text-gray-400">
                    <em>SEPI Hall Of Fame</em> reprezintă încercarea noastră de a păstra o istorie a concursurilor. 
                    Aici vei găsi informații despre concursuri, comisii, participanți și rezultate românilor la concursuri naționale și internaționale precum <em>OJI</em>, <em>ONI</em> și <em>IOI</em>.

                    <p>Fiecare concurs are o pagină dedicată unde poți vedea informații despre locație, dată, câștigători și multe altele.</p>
                    <p>Fiecare participant are o pagină dedicată unde poți vedea rezultate naționale și internaționale.</p>
                </p>
            </div>

            {{-- Second column --}}
            <div>
                <p
                    class="mb-6 text-lg text-center font-normal text-gray-700 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Ultimele concursuri
                </p>

                @if ($contests->isEmpty())
                    <h2>No contests found!</h2>
                @else
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg rankingTable">
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
                                @if ($loop->index >= 5)
                                    @break
                                @endif

                                <tr>
                                    <td>
                                        <a href="{{ route('contests.show', ['name_id' => $contest->name_id]) }}">{{ $contest->name }}</a>
                                    </td>
                                    <td>{{ $contest->location }}</td>
                                    <td>{{ $contest->date }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>


</body>
</html>
