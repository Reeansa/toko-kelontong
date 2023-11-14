<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentPage = request()->input( 'page' );
        $user       = User::all();

        session::put( 'currentPage', $currentPage );

        return view( 'pages.user', compact('user') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'pages.users.add' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request )
    {
        $request->validate( [ 
            'email'    => 'required|unique:users|max:255',
            'password' => 'required',
        ] );

        $data = [ 
            'name'     => $request->input( 'name' ),
            'email'    => $request->input( 'email' ),
            'password' => $request->input( 'password' ),
            'role'     => $request->input( 'role' ),
            'status'   => $request->input( 'status' ),
        ];

        if (User::create( $data ) == true) {
            return redirect( '/users' )->with( 'success', 'Data berhasil disimpan!' );
        }
        return redirect( '/users' )->with( 'error', 'Data gagal disimpan!' );
        
    }

    /**
     * Display the specified resource.
     */
    public function show( User $user )
    {
        return view('pages.users.update', compact('user') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( User $user )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, User $user )
    {
        $data = [ 
            'name'     => $request->input( 'name' ),
            'email'    => $request->input( 'email' ),
            'role'     => $request->input( 'role' ),
            'status'   => $request->input( 'status' ),
        ];

        if ( $user->update( $data ) ) {
            return redirect( '/users' )->with( 'success', 'Data berhasil diubah!' );
        }
        return redirect( '/users' )->with( 'error', 'Data gagal diubah!' );
    }

    public function changeStatus(User $user )
    {
        if ( !$user ) {
            return redirect( 'users' )->with( 'error', 'Pengguna tidak ditemukan!' );
        }
        
        $status = $user->status == 'active' ? 'nonactive' : 'active';

        $user->update( [ 'status' => $status ] );
        $currentPage = Session::get( 'currentPage', 1 );
        return redirect( 'users?page=' . $currentPage )->with( 'success', 'Status berhasil diubah!' );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $user )
    {
        $user->delete();
        return redirect( 'users' )->with( 'success', 'Data berhasil dihapus!' );
    }
}
