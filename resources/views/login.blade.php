<!DOCTYPE html>
<html lang="en">
    @include('_partials.head')

    <body class="flex flex-col items-center justify-center h-screen w-screen">
        @if (session('success'))
            <h1 class="bg-green-500 text-green-300 px-5 py-1 rounded">{{ session('success') }}</h1>
        @elseif (session('error'))
            <h1 class="bg-red-500 text-red-300 px-5 py-1 rounded">{{ session('error') }}</h1>
        @endif
        <h1 class="mb-5">welcome</h1>
        <form class="flex flex-col gap-5 bg-slate-300 p-10 rounded" action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <label for="email">email</label>
                <input class="rounded @error('email') border-red-500 @enderror" type="email" name="email"
                    id="email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="password">password</label>
                <input class="rounded @error('password') border-red-500 @enderror" type="password" name="password"
                    id="password">
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button class="text-white bg-slate-800 hover:bg-slate-600 px-5 py-2 rounded">kirim</button>
                <a class="hover:bg-slate-600 hover:text-white px-5 py-2 rounded transition duration-300 ease-in"
                    href="/register">register</a>
            </div>
        </form>
    </body>

</html>
