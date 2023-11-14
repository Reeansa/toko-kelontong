@extends('main')
@section('title', 'add user')
@section('content')
    <h1 class="text-3xl text-slate-800">Add User</h1>
    <hr class="my-5">
    <form class="flex flex-col gap-5" method="POST" action="/users/add/process">
        @csrf
        <div>
            <label for="name">nama</label>
            <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('name') }}">
        </div>
        <div>
            <label for="email">email</label>
            <input type="text" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
        </div>
        <div>
            <label for="role">role</label>
            <select name="role" id="role" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select> 
        </div>
        <div>
            <label for="status">status</label>
            <select name="status" id="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="active">active</option>
                <option value="nonactive">nonactive</option>
            </select>
        </div>
        <div class="flex w-full text-end gap-10">
            <button type="submit" class="bg-slate-800 text-white hover:bg-slate-700 px-10 py-2 rounded">kirim</button>
            <button type="submit" class="hover:text-red-600"><a href="/users">cancel</a></button>
        </div>
    </form>
@endsection
