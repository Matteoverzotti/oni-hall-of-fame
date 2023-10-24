<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONI Vault</title>
</head>

<body>
    @include('partials._navbar')


    <h1
        class="mb-4 text-4xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Bine ai venit la ONI Vault!
    </h1>
    <p class="mb-6 text-lg text-center font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
        Ultimele concursuri
    </p>

    @if (count($contests) == 0)
    <h2>No contests found!</h2>
    @else

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                @if ($loop->index < 5) <x-tr>
                    <x-td><a href="{{ route('contests.show', ['name_id' => $contest->name_id]) }}">{{ $contest->name
                            }}</a></x-td>
                    <x-td>{{ $contest->location }}</x-td>
                    <x-td>{{ $contest->date }}</x-td>
                    </x-tr>
                    @else
                    @break
                    @endif
                    @endforeach
            </tbody>
        </table>
    </div>
    @endif
</body>

</html>