@extends('../../layouts.admin-layout')
@section('title','Data Kecamatan')
@section('admin-content')
<div class="container ml-5">
            <div class="row">
                <div class="col-md-6">
                        <!-- Button trigger modal -->
                    <h1>Data Kecamatan</h1>
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#kecamatanModal"> <i class="fa fa-plus"></i> Tambah Data </button>
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
                            <th scope="col">kecamatan</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($restricts as $restrict)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $restrict->kecamatan}}</td>
                                <td><a href="{{route('admin.restrict.edit',$restrict->id_kecamatan)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{route('admin.restrict.destroy',$restrict->id_kecamatan)}}" style="display:inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin Hapus ?')"> <i class="fa fa-trash"></i> Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="kecamatanModal" tabindex="-1" role="dialog" aria-labelledby="kecamatanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kecamatanModalLabel">Form Tambah Kecamatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('admin.restrict.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="kecamatan">Restrict Name</label>
                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" aria-describedby="emailHelp" placeholder="restrict name ..." name="kecamatan" value="{{old('kecamatan')}}" autofocus>
                            @error('kecamatan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                       
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Save changes</button>
                    </div>
                    </form>
        </div>
      
    </div>
  </div>
</div>
@endsection