@extends('../../layouts.admin-layout')
@section('title','Data Kebarakan Di Kota Semarang')
@section('admin-content')
        <div class="container ml-5">
        
            <div class="row">
                <div class="col-md-10">
                    <h1>Data Kebarakaran di Kota Semarang</h1><a href="{{ route('admin.pen_penanggulangan_bencana_add')}}" class="btn btn-primary mb-4"> <i class="fa fa-plus"></i> Tambah Data</a>
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Penyebab</th>
                            <th scope="col">Kategori Tempat Kebakaran</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($penanggulanganBencanas as $penanggulanganBencana)
                       <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$penanggulanganBencana->tanggal}}</td>
                           <td>{{$penanggulanganBencana->penyebab}}</td>
                           <td>{{$penanggulanganBencana->tempat_kebakaran}}</td>
                           <td>{{$penanggulanganBencana->jumlah}}</td>
                           <td><a href="{{route('admin.penanggulanganBencana.edit',$penanggulanganBencana->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{route('admin.penanggulanganBencana.destroy',$penanggulanganBencana->id)}}" method="post" style="display:inline;">
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