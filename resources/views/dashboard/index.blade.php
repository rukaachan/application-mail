@extends('layout.layout')
@section('title', 'Daftar Surat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Surat
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="surat/tambah">
                                <btn class="btn btn-success">Tambah Surat</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>TANGGAL SURAT</th>
                                    <th>RINGKASAN</th>
                                    <th>FOTO SURAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($Surat as $u)
                                    <tr>
                                        <td>{{ $u->Suratname }}</td>
                                        <td>{{ $u->role }}</td>
                                        <td>
                                            <a href="Surat/edit/{{ $u->id_Surat }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idSurat="{{ $u->id_Surat }}">HAPUS</btn>

                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
