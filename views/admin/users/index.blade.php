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
    <div class="row">
        <div class="col-12 mb-lg-0">
            <div class="card">
                <a href="/admin/users/create" class="btn btn-sm btn-success">Create</a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Avartar</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td scope="row">{{ $user['id'] }}</td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>
                                            <img src="{{ file_url($user['avatar']) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            @if ($user['type'] == 'admin')
                                                <span class="badge bg-danger">Admin</span>
                                            @else
                                                <span class="badge bg-danger">Client</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a
                                                href="/admin/users/show/{{ $user['id'] }}"class="btn btn-sm btn-primary">Show</a>
                                            <a href="/admin/users/edit/{{ $user['id'] }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="/admin/users/delete/{{ $user['id'] }}"
                                            onclick="return confirm('Có chắc bạn muốn xóa?');"
                                                class="btn btn-sm btn-danger">Delete</a>
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
