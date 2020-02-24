<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PekerjaanUmum;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PekerjaanUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pekerjaanUmums = PekerjaanUmum::All();
        // dd($pekerjaanUmums);
        return view('admin/pekerjaanUmum/index',['pekerjaanUmums'=>$pekerjaanUmums]);

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
            'tahun'=>'required',
            'sumber_dana'=>'required',
            'jumlah_dana'=>'required',
        ]);
        $pekerjaanUmum = new PekerjaanUmum;
        $pekerjaanUmum->tahun = $request->tahun;
        $pekerjaanUmum->sumber_dana = $request->sumber_dana;
        $pekerjaanUmum->jumlah_dana = $request->jumlah_dana;
        $pekerjaanUmum->save();
        return redirect('admin/pekerjaanUmum')->with('status','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PekerjaanUmum  $pekerjaanUmum
     * @return \Illuminate\Http\Response
     */
    public function show(PekerjaanUmum $pekerjaanUmum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PekerjaanUmum  $pekerjaanUmum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($id ===""){
            return view('admin/404');
        }else{
            $pekerjaanUmums = DB::table('pek_pekerjaan_umums')
                            ->where('pek_pekerjaan_umums.id',$id)
                            ->get();
            if($pekerjaanUmums != null){
                return view('admin/pekerjaanUmum/edit',['pekerjaanUmums'=>$pekerjaanUmums]);
            }else{
                return view('admin/404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PekerjaanUmum  $pekerjaanUmum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            
            'tahun'=>'required',
            'sumber_dana'=>'required',
            'jumlah_dana'=>'required',
        ]);

        $pekerjaanUmum = PekerjaanUmum::find($id);
        $pekerjaanUmum->tahun = $request->tahun;
        $pekerjaanUmum->sumber_dana = $request->sumber_dana;
        $pekerjaanUmum->jumlah_dana = $request->jumlah_dana;
        $pekerjaanUmum->save();
        return redirect('admin/pekerjaanUmum')->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PekerjaanUmum  $pekerjaanUmum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pekerjaanUmum = PekerjaanUmum::find($id);
        $pekerjaanUmum->delete();
        return redirect('admin/pekerjaanUmum')->with('status','Data Berhasil Dihapus');
    }
    public function cd_pekerjaanUmum(){
        return view('admin/pekerjaanUmum/pekerjaanUmum_tambah');
    }
}
