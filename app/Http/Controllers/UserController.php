<?php

namespace App\Http\Controllers;

use App\Models\TblUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TblUser $user)
    {

        $data = [
            'user' => $user->all()
        ];
        return view('user.index', $data);
        // return view('user.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TblUser $user)
    {
        $data = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
                'role'    => ['required'],
            ]
        );

        //Proses Insert
        if ($data) {
            $data['id_user'] = 1;
            // Simpan jika data terisi semua
            $user->create($data);
            return redirect('admin/user')->with('success', 'Data user baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data user gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, TblUser $user)
    {
        $data = [
            'user' =>  TblUser::select('id_user', 'username', 'role')->where('id_user', $id)->first()
        ];

        return view('user.edit', $data);
        // return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TblUser $user)
    {
        $data = $request->validate([
            'username' => ['sometimes'],
            'password' => ['sometimes'],
            'role'    => ['sometimes'],
        ]);

        $id_user = $request->input('id_user');
        if ($id_user !== null) {
            // Process Update

            if ($request->has('password')) {
                $data['password'] = Hash::make($request->input('password'));
            };

            $dataUpdate = $user->where('id_user', $id_user)->update($data);
            if ($dataUpdate) {
                return redirect('admin/user')->with('success', 'Data user berhasil di update');
            } else {
                return back()->with('error', 'Data user gagal di update');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TblUser $user, Request $request)
    {
        $id_user = $request->input('id_user');

        // Hapus 
        $aksi = $user->where('id_user', $id_user)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data user berhasil dihapus'
            ];
        } else {
            // Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'   => 'Data gagal dihapus'
            ];
        }

        return response()->json($pesan);
    }
}
