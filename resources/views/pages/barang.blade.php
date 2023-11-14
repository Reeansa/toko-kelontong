@extends('main')
@section('title', 'data barang')
@section('content')
    <div class="flex justify-between">
        <button class="px-5 py-2 bg-slate-800 text-white rounded"
            onclick="window.location.href='{{ route('barang.create') }}'">tambah barang</button>
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
                    <th>nama</th>
                    <th>harga</th>
                    <th>stok</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($data as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ 'Rp. ' . number_format($barang->harga, 0, ',', '.') }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>{{ $barang->status }}</td>
                        <td class="flex justify-center gap-5">
                            <div class="flex gap-2 items-center hover:bg-slate-800 hover:text-white rounded p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                <a href="{{ route('barang.edit', $barang->id) }}">edit</a>
                            </div>
                            <div class="flex gap-2 items-center hover:bg-red-800 hover:text-white rounded p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('benar ingin dihapus?')">delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
