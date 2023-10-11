@extends('layouts.backend')
@section('content')
    <div class="content">

        <div class="breadcrumb-wrapper">
            <h1>Dokumen Digital</h1>


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>

                    <li class="breadcrumb-item" aria-current="page">{{ $title ? $title : '' }}</li>
                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-12">

                <div class="card card-table-border-none recent-orders" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <a href="#" class="btn btn-primary btn-default">TAMBAH +</a>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>JUDUL</th>
                                    <th class="d-none d-lg-table-cell">DESKRIPSI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td class="d-none d-lg-table-cell">{{ $row->title }}</td>
                                        <td class="d-none d-lg-table-cell">{!! $row->description !!}</td>
                                        <td>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
