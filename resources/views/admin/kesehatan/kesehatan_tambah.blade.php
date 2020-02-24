@extends('../../layouts.admin-layout')
@section('title','Form Input Data')

@section('admin-content')
<div class="container">
    <div class="row">
        <div class="col-md">
        <form action="{{ route('admin.kesehatan.store')}}" method="post">
                @csrf
                @method("post")
            <h2>Form Input Data Kesehatan Warga Kota Semarang</h2>
            <div class="form-group">
                <label for="kecamatan">Pilih Kecamatan</label>
                <select id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" required>
                    <option value="">Pilih</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{$kecamatan->id_kecamatan}}">{{$kecamatan->kecamatan}}</option>
                    @endforeach
                    @error('kecamatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </select>
               
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select id="tahun" class="form-control" name="tahun" required>
                    <option value="">Pilih...</option>
                    @for($i=0;$i<10;$i++)
                    <option value="{{date('Y')-5+$i}}">{{date('Y')-5+$i}}</option>

                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_penyakit">Jenjang Pedidikan</label>
                <select id="jenis_penyakit" class="form-control" name="jenis_penyakit" required>
                    <option value="">Pilih...</option>
                    <option value="Asma">Asma</option>
                    <option value="Jantung">Jantung</option>
                    <option value="Struck">Struck</option>
                    <option value="TBC">TBC</option>
                    <option value="Hipertensi">Hipertensi</option>
                    <option value="Diabetes">Diabetes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" name="jumlah"> orang
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