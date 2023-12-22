<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <title>ONI Vault</title>

</head>

<body class="flex flex-col min-h-screen bg-white dark:bg-gray-900">
    <main class="flex-1">
        @include('partials._navbar')
        <x-flash-message/>
        {{ $slot }}
    </main>

    @include('partials._footer')
</body>
