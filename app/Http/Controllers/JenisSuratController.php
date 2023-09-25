<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JenisSurat $jenis)
    {
        $data = [
            'jenis' => $jenis->all()
        ];
        return view('jenis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JenisSurat $jenis)
    {
        //
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
    public function edit(string $id, Request $request, JenisSurat $jenis)
    {
        return view('jenis.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSurat $jenis)
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
