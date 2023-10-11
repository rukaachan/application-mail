@extends('layout.layout')
@section('title', 'Daftar Transaksi')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Transaksi Surat
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover table-bordered DataTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="selectedAll">
                                        </th>
                                        <th>TRANSAKSI SURAT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $tx)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selected">
                                            </td>
                                            <td>{{ $tx->logs }}</td>
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
