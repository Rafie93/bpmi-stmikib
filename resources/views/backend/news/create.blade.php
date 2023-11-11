@extends('layouts.backend')
@section('content')
    <div class="content">

        <div class="breadcrumb-wrapper">
            <h1>Berita</h1>


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('backend.news') }}" style="color: rgb(0, 162, 255)">{{ $title ? $title : '' }} </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Tambah {{ $title ? $title : '' }}</li>
                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <form method="POST" action="{{ route('backend.news.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInput1">Cover *</label>
                            <input type="file" name="file" class="form-control" id="exampleInput1"
                                placeholder="Enter file">

                            {{-- display error --}}
                            @if ($errors->has('file'))
                                <div class="text-danger">
                                    {{ $errors->first('file') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInput1">Judul *</label>
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
                            <label for="exampleInput1">Kategori *</label>
                            <input type="text" name="category" class="form-control" id="exampleInput1"
                                placeholder="Enter Kategori">

                            {{-- display error --}}
                            @if ($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInput1">Deskripsi</label>
                            <textarea name="description" id="editor" class="form-control" id="" cols="30" rows="10"></textarea>

                            {{-- display error --}}
                            @if ($errors->has('description'))
                                <div class="text-danger">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInput1">Status *</label>
                            <select name="status" id="" class="form-control">
                                <option value="1" selected>Publish</option>
                                <option value="0">Draft</option>
                            </select>

                            {{-- display error --}}
                            @if ($errors->has('status'))
                                <div class="text-danger">
                                    {{ $errors->first('status') }}
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
        CKEDITOR.replace('editor', {
            height: '200px',
            filebrowserUploadUrl: "{{ route('backend.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
