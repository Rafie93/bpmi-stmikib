@extends('layouts.backend')
@section('content')
    <div class="content">

        <div class="breadcrumb-wrapper">
            <h1>About BPMI</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('backend.about', $type) }}"
                            style="color: rgb(0, 162, 255)">{{ $title ? $title : '' }} </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Edit {{ $title ? $title : '' }}</li>
                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <form method="POST" action="{{ route('backend.about.update', [$type, $data->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInput1">Judul</label>
                            <input type="text" name="title" value="{{ $data->title }}" class="form-control"
                                id="exampleInput1" placeholder="Enter Judul">

                            {{-- display error --}}
                            @if ($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInput1">Deskripsi</label>
                            <textarea name="description" class="form-control" id="editor" cols="30" rows="10">
                                {!! $data->description !!}
                            </textarea>

                            {{-- display error --}}
                            @if ($errors->has('description'))
                                <div class="text-danger">
                                    {{ $errors->first('description') }}
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
