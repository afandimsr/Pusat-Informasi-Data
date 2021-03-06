@extends('../../layouts.admin-layout')
@section('title','Form Input Data')

@section('admin-content')
<div class="container ml-5">
    <div class="row">
        <div class="col-md-8">
        <form action="{{ route('admin.penanggulanganBencana.store')}}" method="post">
                @csrf
                @method("post")
            <h2>Form Input Kebakaran di Kota Semarang</h2>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control @error('jumlah_dana') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="penyebab">Sumber Dana</label>
                <select id="penyebab" class="form-control" name="penyebab">
                <option value="">Pilih...</option>
                    <option value="Konsleting Listrik"  >Konsleting Listrik</option>
                    <option value="Kebocoran Gas"  >Kebocoran Gas</option>
                    <option value="Selang Bocor">Selang Bocor</option>
                    <option value="Lainnya" >Lainnya</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="tempat_kebakaran">Kategori tempat Kebakaran</label>
                <select id="tempat_kebakaran" class="form-control" name="tempat_kebakaran">
                <option value="">Pilih...</option>
                    <option value="Tempat Tinggal"  >Tempat Tinggal</option>
                    <option value="Ruko"  >Ruko</option>
                    <option value="Kos">Kos</option>
                    <option value="Tempat Ibadah">Tempat Ibadah</option>
                    <option value="Lainnya" >Lainnya</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah </label>
                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="jumlah" name="jumlah"> 
                @error('jumlah')
                        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>


@endsection