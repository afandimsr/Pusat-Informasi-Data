@extends('../../layouts.admin-layout')
@section('title','Data Anggaran Kontruksi Kota Semarang')
@section('admin-content')
        <div class="container ml-5">
        
            <div class="row">
                <div class="col-md-10">
                    <h1>Data Anggaran Kontruksi Kota Semarang</h1><a href="{{ route('admin.pek_pekerjaan_umum_add')}}" class="btn btn-primary mb-4"> <i class="fa fa-plus"></i> Tambah Data</a>
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
                            <th scope="col">Sumber Dana</th>
                            <th scope="col">Jumlah Dana</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pekerjaanUmums as $pekerjaanUmum)
                       <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$pekerjaanUmum->tahun}}</td>
                           <td>{{$pekerjaanUmum->sumber_dana}}</td>
                           <td>{{$pekerjaanUmum->jumlah_dana}}</td>
                           <td><a href="{{route('admin.pekerjaanUmum.edit',$pekerjaanUmum->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{route('admin.pekerjaanUmum.destroy',$pekerjaanUmum->id)}}" method="post" style="display:inline;">
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