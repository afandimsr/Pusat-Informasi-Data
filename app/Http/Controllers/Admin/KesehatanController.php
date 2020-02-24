<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kesehatan;
use App\Kecamatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kesehatans = DB::table('k_kesehatan')
                        ->leftjoin('kecamatan_smgs','k_kesehatan.id_kecamatan','=','kecamatan_smgs.id_kecamatan')
                        ->get();
        
        return view('/admin/kesehatan/index',['kesehatans'=>$kesehatans]);
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
        $request->validate([
            'kecamatan' =>"required|not_in:0",
            'tahun'=>"required",
            'jenis_penyakit' =>"required",
            'jumlah'=>'required',
        ]);
        $kesehatan = new Kesehatan;
        $kesehatan->id_kecamatan = $request->kecamatan;
        $kesehatan->tahun = $request->tahun;
        $kesehatan->jenis_penyakit = $request->jenis_penyakit;
        $kesehatan->jumlah =$request->jumlah;
        $kesehatan->save();
        return redirect('/admin/kesehatan')->with('status','Data Successfully Added !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kesehatan $kesehatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id ==="") {
            return redirect('/admin/kesehatan')->with('status','Access Denied');
        }else{
            # code...
            $kesehatans = DB::table('k_kesehatan')
                        ->join('kecamatan_smgs','k_kesehatan.id_kecamatan','=','kecamatan_smgs.id_kecamatan')
                        ->where('k_kesehatan.id',$id)->get();
            // dd($kesehatans);
            if ($kesehatans!="") {
                # code...
                return view('/admin/kesehatan/edit',['kesehatans'=>$kesehatans]);
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
     * @param  \App\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kecamatan' =>"required",
            'tahun'=>"required",
            'jenis_penyakit' =>"required",
            'jumlah'=>'required',
        ]);
        $kesehatans = Kesehatan::find($id);
        $kesehatans->id_kecamatan = $request->kecamatan;
        $kesehatans->tahun = $request->tahun;
        $kesehatans->jenis_penyakit = $request->jenis_penyakit;
        $kesehatans->jumlah = $request->jumlah;
        $kesehatans->save();
        return redirect('/admin/kesehatan')->with('status','Data Has Been Updated !!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $kesehatan = Kesehatan::find($id);
        $kesehatan->delete();
        return redirect('admin/kesehatan')->with('status','Data Berhasil Dihapus');
    }

    public function cd_kesehatan(){
        $dataKecamatan = DB::table('kecamatan_smgs')->get();
        return view('admin/kesehatan/kesehatan_tambah',['kecamatans'=>$dataKecamatan]);
    }
}
