@include('partials._navbar')

<h1> Adăugare concurs </h1>

<form method="POST" action="/contests">
    @csrf
    <label for="name">Nume concurs</label>
    <input type="text" name="name" value="{{ old('name') }}" />

    @error('name')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror

    @if (session('error'))
        <div class="text-red-500 text-xs mt-1">{{ session('error') }}</div>
    @endif

    <br>

    <label for="location">Locație concurs</label>
    <input type="text" name="location" value="{{ old('location') }}" />
    @error('location')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror

    <br>

    <label for="date">Dată concurs</label>
    <input type="text" name="date" placeholder="Format: YYYY-MM-DD" value="{{ old('date') }}" />
    @error('date')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
    <div class="mb-6">
        <button class="text-red-600 rounded py-2 px-4 hover:bg-gray">
            Create Contest
        </button>
    </div>
</form>
