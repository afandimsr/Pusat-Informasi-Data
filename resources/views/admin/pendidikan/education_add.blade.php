@extends('../../layouts.admin-layout')
@section('title','Form Input Data')

@section('admin-content')
<div class="container ml-5">
    <div class="row">
        <div class="col-md-10">
        <form action="{{ route('admin.education.store')}}" method="post">
                @csrf
                @method("post")
            <h2>Form Input Data Siswa Putus Sekolah</h2>
            <div class="form-group">
                <label for="kecamatan">Pilih Kecamatan</label>
                <select id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" required>
                    <option value="">Pilih...</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{$kecamatan->id_kecamatan}}">{{$kecamatan->kecamatan}}</option>
                    @endforeach

                </select>
                    @error('kecamatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select id="tahun" class="form-control  @error('tahun') is-invalid @enderror" name="tahun" required>
                    <option value="">Pilih...</option>
                    @for($i=0;$i<10;$i++)
                    <option value="{{date('Y')-5+$i}}">{{date('Y')-5+$i}}</option>
                    @endfor
                </select>
               
                    @error('tahun')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="jenjang_pendidikan">Jenjang Pedidikan</label>
                <select id="jenjang_pendidikan" class="form-control  @error('jenjang_pendidikan') is-invalid @enderror" name="jenjang_pendidikan" required>
                    <option value="">Pilih...</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA/Sederajat</option>
                </select>
               
                    @error('jenjang_pendidikan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="status_pendidikan">Status Pedidikan</label>
                <select id="status_pendidikan" class="form-control  @error('status_pendidikan') is-invalid @enderror" name="status_pendidikan" required>
                    <option value="">Pilih...</option>
                    <option value="Negeri">Negeri</option>
                    <option value="Swasta">Swasta</option>
                    
                </select>
               
                    @error('status_pendidikan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control  @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" name="jumlah" required> orang
                
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