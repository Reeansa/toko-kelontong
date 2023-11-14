<!DOCTYPE html>
<html lang="en">
    @include('_partials.head')

    <body class="flex flex-col items-center justify-center h-screen w-screen">
        <h1 class="mb-5">welcome</h1>
        <div
            class="btn button flex items-center gap-2 hover:bg-slate-600 hover:text-white px-5 py-2 rounded transition duration-300 ease-in">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
            </svg>
            <a href="/login">back</a>
        </div>
        <form class="flex flex-col gap-5 bg-slate-300 p-10 rounded" action="{{ route('register.process') }}"
            method="post">
            @csrf
            <div class="flex flex-col">
                <label for="name">nama</label>
                <input class="rounded @error('name') border-red-500 @enderror" type="text" name="name"
                    id="name" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="email">email</label>
                <input class="rounded @error('email') border-red-500 @enderror" type="text" name="email"
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
            <div>
                <button class="text-white bg-slate-800 hover:bg-slate-600 px-5 py-2 rounded">kirim</button>
            </div>
        </form>
    </body>

</html>
