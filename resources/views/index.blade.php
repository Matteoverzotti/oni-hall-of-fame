<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONI Vault</title>
</head>

<body>
@include('partials._navbar')

<h1>Bine ai venit la ONI Vault!</h1>

<div class="flex flex-col items-center min-h-screen">
    {{-- Two columns div --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 p-36">
        {{-- First column --}}
        <div>
            <p
                class="mb-6 text-lg text-center font-normal text-gray-700 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                Ce este ONI-Vault?
            </p>
            <p class="mb-3 text-gray-700 dark:text-gray-400">
                {{ Lipsum::short()->text(3) }}
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
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
</body>

</html>
