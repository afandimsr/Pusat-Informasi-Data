@extends('../../layouts.admin-layout')
@section('title','Form Update Data')

@section('admin-content')
<div class="container">
    <div class="row">
        <div class="col-md">
        @foreach($educations as $education)
                @endforeach
       {{-- dd($educationss) --}}
        <form action="{{route('admin.education.update',$education->id)}}" method="post">
                @csrf
                @method("put")
            <h2>Form Edit Data Siswa Putus Sekolah</h2>
            
            <div class="form-group">
                <label for="kecamatan">Pilih Kecamatan</label>
                <select id="kecamatan" class="form-control" name="kecamatan">
                @foreach($kecamatans as $kecamatan)
                    <option value="{{$kecamatan->id_kecamatan}}" {{($kecamatan->id_kecamatan == $education->id_kecamatan)?'selected':''}}>{{$kecamatan->kecamatan}}</option>
                @endforeach
                </select>
                
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select id="tahun" class="form-control" name="tahun">
                    
                    @for($i=0;$i<10;$i++)
                    <option value="{{date('Y')-5+$i}}" {{($education->tahun== date('Y')-5+$i) ? 'selected':''}}>{{date('Y')-5+$i }}</option>

                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="jenjang_pendidikan">Jenjang Pedidikan</label>
                <select id="jenjang_pendidikan" class="form-control" name="jenjang_pendidikan">
                    
                    <option value="SD"  @if($education->jenjang_pendidikan =="SD") selected @else "" @endif>SD</option>
                    <option value="SMP" @if($education->jenjang_pendidikan =="SMP") selected @else "" @endif>SMP</option>
                    <option value="SMA" @if($education->jenjang_pendidikan =="SMA") selected @else "" @endif>SMA/Sederajat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status_pendidikan">Status Pedidikan</label>
                <select id="status_pendidikan" class="form-control" name="status_pendidikan">
                    
                    <option value="Swasta" {{ ($education->status_pendidikan =="Swasta")?"selected":"" }}>Swasta</option>
                    <option value="Negeri" {{ ($education->status_pendidikan =="Negeri")?"selected":""}}>Negeri</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah" value="{{$education->jumlah}}"> orang
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>


@endsection