<?php

namespace App\Http\Controllers;
use App\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/index');
    }
    public function education_show(){
       
        // $kecamatan = DB::table('kecamatan_smgs')
        // ->OrderBy('kecamatan_smgs.id_kecamatan')
        // ->get();
        // dd($pendidikan);
        $pendidikan = DB::table('educations')
        ->leftJoin('kecamatan_smgs', 'educations.id_kecamatan', '=', 'kecamatan_smgs.id_kecamatan')->OrderBy('kecamatan_smgs.id_kecamatan')
            ->get();
           
    // dd($pendidikan);
        
        $kecamatans = [];
        $jumlah=[];
        $datas =[]; 
        $dataJenjang = [];
        $jumalhKec = [];
        // dd($pendidikan);
        foreach ($pendidikan as $data =>$value ) {
            
            if(in_array($value->kecamatan,$kecamatans)){
                    
                    $index = array_search($value->kecamatan,$kecamatans);
                    $jumlah[$index] +=$value->jumlah;           
                    
                continue;
            }
            $kecamatans[] = $value->kecamatan;
            $jumlah[] = $value->jumlah;

        }

        $kecamatan = collect($kecamatans);
        $combined = $kecamatan->combine($jumlah);
        $dataAll= $combined->all();
    
        $kecamatans2 =[];
        foreach($dataAll as $kecamatan =>$value){
            foreach($pendidikan as $data){
                if($kecamatan ==$data->kecamatan){
                    $kecamatans2[] = $data->kecamatan;
                }
            }
        }
        // dd($kecamatans2);
    //data per jenjang pendidikan 
        $pendidikan2 =DB::table('educations')
        ->leftJoin('kecamatan_smgs', 'educations.id_kecamatan', '=', 'kecamatan_smgs.id_kecamatan')->OrderBy('kecamatan_smgs.id_kecamatan')
            ->get();  
            foreach ($pendidikan2 as $data =>$value ) {
                // $kecamatans[] = $data->kecamatan;
                if(in_array($value->kecamatan,$kecamatans)){
                        
                        $index = array_search($value->kecamatan,$kecamatans);
                        $jumlah[$index] +=$value->jumlah;                    // $jumlah[]= $data->jumlah;
                        // $dataAll =collect( $jumlah);
                        
                    continue;
                }
                $kecamatans[] = $value->kecamatan;
                $jumlah[] = $value->jumlah;
    
            }
        // dd($pendidikan2); 
    


        return view('/pendidikan',['dataAll'=>$dataAll]);
    }
    
}
