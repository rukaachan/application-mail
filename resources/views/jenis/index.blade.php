@extends('layout.layout')
@section('title', 'Daftar Jenis')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Jenis Surat
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="surat/tambah">
                                <btn class="btn btn-success">Tambah Jenis Surat</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>JENIS SURAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $j)
                                    <tr>
                                        <td>{{ $j->jenis_surat }}</td>
                                        <td>
                                            <a href="surat/edit/{{ $j->id_jenis_surat }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idJenis="{{ $j->id_jenis_surat }}">HAPUS
                                            </btn>

                                        </td>
                                    </tr>
                                @endforeach
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
