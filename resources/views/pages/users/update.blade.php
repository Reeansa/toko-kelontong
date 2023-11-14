@extends('main')
@section('title', 'update user')
@section('content')
    <h1 class="text-3xl text-slate-800">update user</h1>
    <hr class="my-5">
    <form class="flex flex-col gap-5" method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">nama</label>
            <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->name }}">
        </div>
        <div>
            <label for="email">email</label>
            <input type="text" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="role">role</label>
            <input type="text" name="role" id="role" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->role }}" required>
        </div>
        <div>
            <label for="status">status</label>
            <select name="status" id="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @if ($user->status == 'active')
                    <option value="active" selected>active</option>
                    <option value="non-active">non active</option>
                    @else
                    <option value="active">active</option>
                    <option value="non-active" selected>non active</option>
                @endif
            </select>
        </div>
        <div class="flex w-full text-end gap-10">
            <button type="submit" class="bg-slate-800 text-white hover:bg-slate-700 px-10 py-2 rounded">send</button>
            <button type="submit" class="hover:text-red-600"><a href="/users">cancel</a></button>
        </div>
    </form>
@endsection
