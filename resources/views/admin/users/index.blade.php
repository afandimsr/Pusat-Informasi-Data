@extends('../../layouts.admin-layout')
@section('title','User Management')
@section('admin-content')
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h1>User Management</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td></td>
                            <td><a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-success"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="{{route('admin.users.destroy',$user->id)}}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                                <button tyype="submit" class="btn btn-danger" onclick="return confirm('yakin ingin hapus ?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
@endsection