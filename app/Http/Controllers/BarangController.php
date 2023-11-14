<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::all();
        return view( 'pages.barang', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'pages.barang.add' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ): RedirectResponse
    {
        $request->validate( [ 
            'namaBarang' => 'required',
            'harga'      => 'required',
            'stok'       => 'required',
            'status'     => 'required'
        ] );

        $data = [ 
            'nama_barang' => $request->input( 'namaBarang' ),
            'harga'       => $request->input( 'harga' ),
            'stok'        => $request->input( 'stok' ),
            'status'      => $request->input( 'status' ),
        ];

        if ( Barang::create( $data ) == true ) {
            return redirect( 'barang' )->with( 'success', 'Data berhasil disimpan!' );
        }
        return redirect( 'barang.create' )->with( 'error', 'Data gagal disimpan!' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Barang $barang )
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Barang $barang )
    {
        return view( 'pages.barang.edit', compact( 'barang' ) );
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Barang $barang )
    {
        $data = [ 
            'nama_barang'   => $request->input( 'namaBarang' ),
            'harga'  => $request->input( 'harga' ),
            'stok'   => $request->input( 'stok' ),
            'status' => $request->input( 'status' ),
        ];

        if ( $barang->update( $data ) ) {
            return redirect( 'barang' )->with( 'success', 'Data berhasil diubah!' );
        }
        return redirect( 'barang' )->with( 'error', 'Data gagal diubah!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Barang $barang )
    {
        if ($barang->delete()) {
            return redirect('barang')->with( 'success', 'Data berhasil dihapus' );
        } else {
            return redirect('barang')->with( 'error', 'Data gagal dihapus' );
        }
        return redirect( 'barang' )->with('error', 'check kembali!');
    }
}
