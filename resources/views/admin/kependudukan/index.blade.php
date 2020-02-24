@extends('../../layouts.admin-layout')
@section('title','Data Kependudukan')
@section('admin-content')
        <div class="container ml-5">
        
            <div class="row">
                <div class="col-md-10">
                    <h1>Data Kependudukan</h1><a href="{{ route('admin.kep_pend_add')}}" class="btn btn-primary mb-4"> <i class="fa fa-plus"></i> Tambah Data</a>
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
                            <th scope="col">Status</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($kependudukans as $kependudukan)
                       <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{ $kependudukan->kecamatan}}</td>
                           <td>{{$kependudukan->tahun}}</td>
                           <td>{{$kependudukan->status}}</td>
                           <td>{{$kependudukan->jumlah}}</td>
                           <td><a href="{{route('admin.kependudukan.edit',$kependudukan->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{route('admin.kependudukan.destroy',$kependudukan->id)}}" method="post" style="display:inline;">
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