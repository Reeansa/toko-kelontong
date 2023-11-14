@extends('main')
@section('title', 'Users')
@section('content')
    <div class="flex justify-between">
        @if (auth()->user()->role == 'admin')
            <button class="bg-slate-800 text-white rounded p-3"
                onclick="window.location.href='{{ route('users.add') }}';">Tambah Data User</button>
        @endif
        @if (session('success'))
            <div class="font-bold text-2xl bg-green-200 text-green-400 rounded px-4 py-2">{{ session('success') }}</div>
            @if (session('error'))
                <div class="font-bold text-2xl bg-red-200 text-red-400 rounded px-4 py-2">{{ session('error') }}</div>
            @endif
        @endif
    </div>
    <div class="p-8 mt-6 rounded shadow bg-white">
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th>name</th>
                    <th>role</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                    <tr class="bg-white border-b hover:bg-gray-50 text-center">
                        <th>
                            {{ $u->name }}
                        </th>
                        <td>
                            {{ $u->role }}
                        </td>
                        <td>
                            @if ($u->status == 'active')
                                <span
                                    class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">{{ $u->status }}</span>
                            @else
                                <span
                                    class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-700/10">{{ $u->status }}</span>
                            @endif
                        </td>
                        <td class="flex justify-center gap-5">
                            <div class="flex gap-2 items-center hover:bg-slate-800 hover:text-white rounded p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                <a href="{{ route('users.show', $u->id) }}">edit</a>
                            </div>
                            <div class="flex gap-2 items-center hover:bg-green-800 hover:text-white rounded p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                <form action="{{ route('users.change-status', $u->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">change status</button>
                                </form>
                            </div>
                            <div class="flex gap-2 items-center hover:bg-red-800 hover:text-white rounded p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    <a href="{{ route('users.delete', $u->id) }}" onclick="return confirm('benar ingin dihapus?')">delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
