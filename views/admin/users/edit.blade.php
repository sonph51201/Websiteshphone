@extends('admin.layouts.main')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
    <h1 class="h2">{{ $title }}</h1>
    @include('admin.components.display-msg-fail')
    @include('admin.components.display-msg-success')    
    @include('admin.components.display-errors')

    <div class="row">
        <div class="col-12 mb-4 mb-lg-0">
            <div class="card-body">
                <div class="container">
                    <form action="/admin/users/update/{{$user['id']}}" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}">
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">email</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="email" name="email" value="{{$user['email']}}">
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="avatar" class="col-sm-2 col-form-label">avatar</label>
                        <div class="col-8">
                            <input type="file" class="form-control" id="avatar" name="avatar" value="{{$user['avatar']}}">
                            <img src="{{file_url($user['avatar'])}}" alt="" width="100px">
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="type" class="col-sm-2 col-form-label">type</label>
                        <div class="col-8">
                            <select name="form-select" name="type" id="type">
                                <option value="admin" @selected($user['type'] == 'admin' )>Admin</option>
                                <option value="client" @selected($user['type'] == 'client')>Client</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="offset-sm-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/admin/users" class="btn btn-warning"> Back to list</a>

                            </div>

                        </div>

                    </div>
                    
                    </form>

                </div>

            </div>

        </div>

    </div>
    @endsection