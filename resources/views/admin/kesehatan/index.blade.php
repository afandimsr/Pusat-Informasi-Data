@extends('../../layouts.admin-layout')
@section('title','Data Kesehatan')
@section('admin-content')
        <div class="container ml-5">
        
            <div class="row">
                <div class="col-md-10">
                    <h1>Data Kesehatan</h1><a href="{{ route('admin.k_kes_add')}}" class="btn btn-primary mb-4"> <i class="fa fa-plus"></i> Tambah Data</a>
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
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Jenis Penyakit</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($kesehatans as $kesehatan)
                       <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$kesehatan->kecamatan}}</td>
                           <td>{{$kesehatan->tahun}}</td>
                           <td>{{$kesehatan->jenis_penyakit}}</td>
                           <td>{{$kesehatan->jumlah}}</td>
                           <td><a href="{{route('admin.kesehatan.edit',$kesehatan->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{route('admin.kesehatan.destroy',$kesehatan->id)}}" method="post" style="display:inline;">
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