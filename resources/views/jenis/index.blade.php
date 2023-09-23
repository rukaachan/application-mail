@extends('layout.layout')
@section('title', 'Daftar Jenis')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Jenis
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="Jenis/tambah">
                                <btn class="btn btn-success">Tambah Jenis Surat</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>JENIS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($Jenis as $u)
                                    <tr>
                                        <td>{{ $u->Jenisname }}</td>
                                        <td>{{ $u->role }}</td>
                                        <td>
                                            <a href="Jenis/edit/{{ $u->id_Jenis }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idJenis="{{ $u->id_Jenis }}">HAPUS</btn>

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
