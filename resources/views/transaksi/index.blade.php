@extends('layout.layout')
@section('title', 'Daftar Transaksi')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Transaksi
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="Transaksi/tambah">
                                <btn class="btn btn-success">Tambah Transaksi</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>TRANSAKSI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($Transaksi as $u)
                                    <tr>
                                        <td>{{ $u->Transaksiname }}</td>
                                        <td>{{ $u->role }}</td>
                                        <td>
                                            <a href="Transaksi/edit/{{ $u->id_Transaksi }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idTransaksi="{{ $u->id_Transaksi }}">HAPUS</btn>

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
