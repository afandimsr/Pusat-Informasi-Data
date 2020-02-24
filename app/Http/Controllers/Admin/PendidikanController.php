<?php

namespace App\Http\Controllers\Admin;

use App\Pendidikan;
use App\Kecamatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = "SELECT * FROM educations join kecamatan_smgs ON educations.id_kecamatan = kecamatan_smgs.id_kecamatan ORDER BY educations.created_at DESC";
        $educations = DB::select($query);
        
        return view('admin/pendidikan/index',['educations'=>$educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kecamatan' =>"required",
            'tahun'=>"required",
            'jenjang_pendidikan' =>"required",
            'status_pendidikan' =>"required",
            'jumlah'=>'required',
        ]);
        $educations = new Pendidikan;
        $educations->id_kecamatan = $request->kecamatan;
        $educations->tahun = $request->tahun;
        $educations->jenjang_pendidikan = $request->jenjang_pendidikan;
        $educations->status_pendidikan = $request->status_pendidikan;
        $educations->jumlah = $request->jumlah;
        $educations->save();
        return redirect('admin/education')->with('status','Education data has been created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        // dd($educations);
        //
        // dd($education);
        if ($id ==="") {
            return redirect('/admin/education')->with('status','Access Denied');
        }else{
            # code...
            $query = "SELECT * FROM educations join kecamatan_smgs ON educations.id_kecamatan = kecamatan_smgs.id_kecamatan WHERE educations.id =".$id."";
            $educations = DB::select($query);
            
            $kecamatans = DB::table('kecamatan_smgs')->get();
            // $educations = Pendidikan::find($id);
            // dd($educations);
            if ($educations!="") {
                # code...
                return view('/admin/pendidikan/edit',['educations'=>$educations,'kecamatans'=>$kecamatans]);
            }
            else{
                return view('/admin/404');

            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kecamatan' =>"required",
            'tahun'=>"required",
            'jenjang_pendidikan' =>"required",
            'status_pendidikan' =>"required",
            'jumlah'=>'required',
        ]);
            
            $pendidikan = Pendidikan::find($id);
            $pendidikan->tahun = $request->tahun;
            $pendidikan->id_kecamatan = $request->kecamatan;
            $pendidikan->status_pendidikan = $request->status_pendidikan;
            $pendidikan->jenjang_pendidikan = $request->jenjang_pendidikan;
            $pendidikan->jumlah = $request->jumlah;
            $pendidikan->save();
            return redirect('/admin/education')->with('status','Data succesced Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $education)
    {
        
        
        $pendidikan = Pendidikan::find($education->id);
        $pendidikan->delete();
        return redirect('/admin/education')->with('status','Data Berhasil dihapus');
    }

    public function cd_pendidikan(){
        $dataKecamatan = DB::table('kecamatan_smgs')->get();
        return view('admin/pendidikan/education_add',['kecamatans'=> $dataKecamatan]);
    }
}
