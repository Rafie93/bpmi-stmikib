@extends('layouts.backend')
@section('content')
    <div class="content">

        <div class="breadcrumb-wrapper">
            <h1>{{ $header }}</h1>


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('backend.monev', $type) }}"
                            style="color: rgb(0, 162, 255)">{{ $title ? $title : '' }} </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Tambah {{ $title ? $title : '' }}</li>
                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <form method="POST" action="{{ route('backend.monev.store', $type) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInput1">Judul</label>
                            <input type="text" name="title" class="form-control" id="exampleInput1"
                                placeholder="Enter Judul">

                            {{-- display error --}}
                            @if ($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="exampleInput1">Jenis Upload File</label>
                            <select name="type_upload" class="form-control" id="type_upload">
                                <option value="">Pilih Jenis Upload File</option>
                                <option value="1">Upload File</option>
                                <option value="2">Upload Link</option>
                            </select>

                            {{-- display error --}}
                            @if ($errors->has('type_upload'))
                                <div class="text-danger">
                                    {{ $errors->first('type_upload') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group" id="upload_file">
                            <label for="exampleInput1">File PDF *</label>
                            <input type="file" name="file" class="form-control" id="exampleInput2"
                                placeholder="Enter file" accept="application/pdf">

                            {{-- display error --}}
                            @if ($errors->has('file'))
                                <div class="text-danger">
                                    {{ $errors->first('file') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group" id="sisipkan_link">
                            <label for="exampleInput4">Input Link Drive *</label>
                            <input type="text" name="link" class="form-control" id="exampleInput4"
                                placeholder="Enter Link Google Drive">

                            {{-- display error --}}
                            @if ($errors->has('link'))
                                <div class="text-danger">
                                    {{ $errors->first('link') }}
                                </div>
                            @endif

                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#upload_file').hide();
            $('#sisipkan_link').hide();
            $('#type_upload').change(function() {
                var type_upload = $('#type_upload').val();
                if (type_upload == 1) {
                    $('#upload_file').show();
                    $('#sisipkan_link').hide();
                } else if (type_upload == 2) {
                    $('#upload_file').hide();
                    $('#sisipkan_link').show();
                } else {
                    $('#upload_file').hide();
                    $('#sisipkan_link').hide();
                }
            });
        });
    </script>
@endsection
