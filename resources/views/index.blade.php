@extends("layouts.app")

@section("title","Pusat Data Statistik")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md">
               <div class="row">

                    <div class="col-md-3">
                    <a href="{{route('edu_show')}}" class="link-menus">
                        <div class="card card-edit" >
                            <img class="card-img-top" src="{{asset('images/pendidikan.png')}}" alt="pendidikan">
                            <div class="card-body menus-card">
                                <h5 class="card-title">Pendidikan</h5>
                                <p class="card-text">Pendidikan</p>
                            </div>
                        </div></a>
                    </div>

                    <div class="col-md-3">
                    <a href="" class="link-menus">
                        <div class="card card-edit" >
                            <img class="card-img-top " src="{{asset('images/kesehatan.png')}}" alt="Kesehatan">
                            <div class="card-body menus-card">
                                <h5 class="card-title">Kesehatan</h5>
                                <p class="card-text">Kesehatan</p>
                            </div>
                        </div></a>
                    </div>

                    <div class="col-md-3">
                    <a href="" class="link-menus">
                        <div class="card card-edit" >
                            <img class="card-img-top" src="{{asset('images/keuangan.png')}}" alt="Keuangan">
                            <div class="card-body menus-card">
                                <h5 class="card-title">Keuangan</h5>
                                <p class="card-text">Keuangan</p>
                            </div>
                        </div></a>
                    </div>

                    <div class="col-md-3">
                    <a href="" class="link-menus">
                        <div class="card card-edit" >
                            <img class="card-img-top" src="{{asset('images/kependudukan.png')}}" alt="Kependudukan">
                            <div class="card-body menus-card">
                                <h5 class="card-title">Kependudukan</h5>
                                <p class="card-text">Kependudukan</p>
                            </div>
                        </div></a>
                    </div>
                    

               </div>

            </div>
        </div>
    </div>


@endsection
