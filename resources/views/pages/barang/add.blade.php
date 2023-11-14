@extends('main')
@section('title', 'tambah data barang')
@section('content')
<section class="flex align-center justify-center">
    <form action="{{ route('barang.store') }}" method="POST" class="flex flex-col gap-5 p-8 mt-6 rounded shadow bg-white w-1/3">
        @csrf
        <h1 class="font-bold text-center pt-5 pb-5">edit data barang</h1>
            <div>
                <label for="namaBarang" class="block text-sm font-medium text-gray-600">Nama Barang:</label>
                <input type="text" id="namaBarang" name="namaBarang" class="mt-1 p-2 w-full border rounded-md" value="{{ old('namaBarang') }}">
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-600">Harga:</label>
                <input type="number" id="harga" name="harga" class="mt-1 p-2 w-full border rounded-md" value="{{ old('harga') }}">
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-600">Stok:</label>
                <input type="number" id="stok" name="stok" class="mt-1 p-2 w-full border rounded-md" value="{{ old('stok') }}">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-600">Status:</label>
                <input type="text" id="status" name="status" class="mt-1 p-2 w-full border rounded-md" value="{{ old('status') }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
        </form>
    </section>
@endsection