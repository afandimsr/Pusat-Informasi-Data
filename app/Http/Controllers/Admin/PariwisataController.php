<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pariwisata;
use App\Kecamatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PariwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pariwisatas =Pariwisata::All();
        return view('admin/pariwisata/index',['pariwisatas'=>$pariwisatas]);
        //
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
            'nama_wisata'=>'required',
            'jumlah_wisatawan'=>'required',
        ]);
        $pariwisata = new Pariwisata;
        $pariwisata->tahun = $request->tahun;
        $pariwisata->nama_wisata = $request->nama_wisata;
        $pariwisata->jumlah_wisatawan = $request->jumlah_wisatawan;
        $pariwisata->save();
        return redirect('admin/pariwisata')->with('status','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function show(Pariwisata $pariwisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($id ===""){
            return view('admin/404');
        }else{
            $pariwisatas = DB::table('par_pariwisatas')
                            ->where('par_pariwisatas.id',$id)
                            ->get();
            if($pariwisatas != null){
                return view('admin/pariwisata/edit',['pariwisatas'=>$pariwisatas]);
            }else{
                return view('admin/404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            
            'tahun'=>'required',
            'nama_wisata'=>'required',
            'jumlah_wisatawan'=>'required',
        ]);

        $pariwisata = Pariwisata::find($id);
        $pariwisata->tahun = $request->tahun;
        $pariwisata->nama_wisata = $request->nama_wisata;
        $pariwisata->jumlah_wisatawan = $request->jumlah_wisatawan;
        $pariwisata->save();
        return redirect('admin/pariwisata')->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pariwisata = Pariwisata::find($id);
        $pariwisata->delete();
        return redirect('admin/pariwisata')->with('status','Data Berhasil Dihapus');
    }
    public function cd_pariwisata(){
        return view('admin/pariwisata/pariwisata_tambah');
    }
}
