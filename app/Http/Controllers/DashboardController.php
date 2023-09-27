<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\TblUser;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Surat $surat)
    {
        $data = [
            'surat' => $surat->with('jenis')->get()
        ];

        // dd($data);
        return view('dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(JenisSurat $jenis)
    {
        $jenisSuratRecords = $jenis->all();

        return view('dashboard.tambah', [
            'jenisSuratRecords' => $jenisSuratRecords,
        ]);
    }

    public function store(Request $request, Surat $surat)
    {
        try {
            // Validate your request data
            $data = $request->validate([
                'tanggal_surat' => ['required'],
                'ringkasan' => ['required'],
                'id_jenis_surat' => ['required'],
                'file' => ['required']
            ]);


            $user = Auth::user();

            // dd(Auth::user()->id_user);
            $data['id_user'] = $user->id_user;

            if ($request->hasFile('file')) {
                $foto_file = $request->file('file');
                $foto_ekstensi = $foto_file->getClientOriginalExtension();
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_ekstensi;

                $foto_file->move(public_path('foto'), $foto_nama);

                $data['file'] = $foto_nama;
            }

            // Create a new Surat instance and save it
            if ($surat->create($data)) {
                return redirect('/dashboard/surat')->with('success', 'Data surat baru berhasil ditambah');
            } else {
                return back()->with('error', 'Data surat gagal ditambahkan');
            }
        } catch (\Exception $e) {
            dd($e);
            // dd($data);
            // return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
