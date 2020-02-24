@extends('../../layouts.admin-layout')
@section('title','Form Update Data')

@section('admin-content')
<div class="container">
    <div class="row">
        <div class="col-md">
        @foreach($kesehatans as $kesehatan)
                @endforeach
        
        <form action="{{route('admin.kesehatan.update',$kesehatan->id)}}" method="post">
                @csrf
                @method("put")
            <h2>Form Edit Data Siswa Putus Sekolah</h2>
            
            <div class="form-group">
                <label for="kecamatan">Pilih Kecamatan</label>
                <select id="kecamatan" class="form-control" name="kecamatan">
                @foreach($kesehatans as $kecamatan)
                    <option value="{{$kecamatan->id_kecamatan}}" {{($kecamatan->id_kecamatan == $kesehatan->id_kecamatan)?'selected':''}}>{{$kecamatan->kecamatan}}</option>
                @endforeach
                </select>
                
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select id="tahun" class="form-control" name="tahun">
                    
                    @for($i=0;$i<10;$i++)
                    <option value="{{date('Y')-5+$i}}" {{($kesehatan->tahun== date('Y')-5+$i) ? 'selected':''}}>{{date('Y')-5+$i }}</option>

                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_penyakit">Jenis Penyakit</label>
                <select id="jenis_penyakit" class="form-control" name="jenis_penyakit">
                <option value="none">Pilih...</option>
                    <option value="Asma" @if($kesehatan->jenis_penyakit =="Asma") selected @else "" @endif>Asma</option>
                    <option value="Jantung" @if($kesehatan->jenis_penyakit =="Jantung") selected @else "" @endif>Jantung</option>
                    <option value="Struck" @if($kesehatan->jenis_penyakit =="Struck") selected @else "" @endif>Struck</option>
                    <option value="TBC" @if($kesehatan->jenis_penyakit =="TBC") selected @else "" @endif>TBC</option>
                    <option value="Hipertensi" @if($kesehatan->jenis_penyakit =="Hipertensi") selected @else "" @endif>Hipertensi</option>
                    <option value="Diabetes" @if($kesehatan->jenis_penyakit =="Diabetes") selected @else "" @endif>Diabetes</option>

                  
                </select>
            </div>
          
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah" value="{{$kesehatan->jumlah}}"> orang
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>


@endsection