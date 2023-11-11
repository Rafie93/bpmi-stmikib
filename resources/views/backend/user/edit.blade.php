@extends('layouts.backend')
@section('content')
    <div class="content">

        <div class="breadcrumb-wrapper">
            <h1>User</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('backend.user') }}" style="color: rgb(0, 162, 255)">Data User
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Edit User</li>
                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <form method="POST" action="{{ route('backend.user.update', $data->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInput1">Nama *</label>
                            <input type="text" name="name" class="form-control" id="exampleInput1"
                                placeholder="Enter Nama" value="{{ $data->name }}">
                            @if ($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="exampleInput1">Email *</label>
                            <input type="email" name="email" class="form-control" id="exampleInput2"
                                placeholder="Enter Email" value="{{ $data->email }}">
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="exampleInput1">Password</label>
                            <input type="password" name="password_new" class="form-control" id="exampleInput2"
                                placeholder="Isi Password Untuk Mengganti Password Baru">
                            @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif

                        </div>


                        <div class="form-group">
                            <label for="exampleInput1">Role *</label>
                            <select name="role" id="" class="form-control">
                                <option value="1" {{ $data->role == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $data->role == 2 ? 'selected' : '' }}>Viewer</option>
                            </select>

                            {{-- display error --}}
                            @if ($errors->has('role'))
                                <div class="text-danger">
                                    {{ $errors->first('role') }}
                                </div>
                            @endif

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
