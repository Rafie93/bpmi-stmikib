@extends('layouts.backend')
@section('content')
    <div class="content">

        <div class="breadcrumb-wrapper">
            <h1>Slider</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">

                    <li class="breadcrumb-item" aria-current="page">Data {{ $title ? $title : '' }}</li>
                </ol>
            </nav>

        </div>
        <div class="row">
            @if (session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @elseif (session('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            <div class="col-12">

                <div class="card card-table-border-none recent-orders" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <a href="{{ route('backend.slider.add') }}" class="btn btn-primary btn-default">TAMBAH +</a>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>SLIDE</th>
                                    <th>JUDUL</th>
                                    <th>DESKRIPSI</th>
                                    <th>STATUS</th>
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
                                        <td class="d-none d-lg-table-cell">
                                            <img src="{{ $row->image() }}" height="100" width="100" alt=""
                                                srcset="">
                                        </td>
                                        <td class="d-none d-lg-table-cell">{{ $row->title }}</td>
                                        <td class="d-none d-lg-table-cell">{{ $row->description }}</td>
                                        <td class="d-none d-lg-table-cell">{{ $row->status == 1 ? 'Publish' : 'Draft' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('backend.slider.edit', [$row->id]) }}"
                                                class="btn btn-info btn-sm">EDIT</a>
                                            <a href="{{ route('backend.slider.delete', [$row->id]) }}"
                                                class="btn btn-danger btn-sm">HAPUS</a>
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
