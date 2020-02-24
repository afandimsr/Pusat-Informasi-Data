@extends('../../layouts.admin-layout')
@section('title','Data Lingkungan Hidup')
@section('admin-content')
        <div class="container ml-5">
        
            <div class="row">
                <div class="col-md-10">
                    <h1>Data Lingkungan Hidup</h1><a href="{{ route('admin.lh_lingkungan_add')}}" class="btn btn-primary mb-4"> <i class="fa fa-plus"></i> Tambah Data</a>
                    @if (session('status'))
                            <div class="alert alert-success mt-2">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Jenis Rumah</th>
                            <th scope="col">Debit Air</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($lingkunganHidups as $lingkunganHidup)
                       <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$lingkunganHidup->tahun}}</td>
                           <td>{{$lingkunganHidup->jenis_rumah}}</td>
                           <td>{{$lingkunganHidup->debit_air}}</td>
                           <td><a href="{{route('admin.lingkunganHidup.edit',$lingkunganHidup->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{route('admin.lingkunganHidup.destroy',$lingkunganHidup->id)}}" method="post" style="display:inline;">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin hapus ?')"> <i class="fa fa-trash"></i> Delete</button>
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