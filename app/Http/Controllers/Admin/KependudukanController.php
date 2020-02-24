<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kependudukan;
use App\Kecamatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kependudukans = DB::table('kep_penduduk')
                        ->leftjoin('kecamatan_smgs','kep_penduduk.id_kecamatan','=','kecamatan_smgs.id_kecamatan')
                        ->orderBy('kecamatan_smgs.id_kecamatan','desc')->get();
                        // dd($kependudukans);
        return view('admin/kependudukan/index',['kependudukans'=>$kependudukans]);
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
            'kecamatan' => 'required',
            'tahun' => 'required',
            'status' => 'required',
            'jumlah' =>'required',
        ]);
        $kependudukan = new Kependudukan;
        $kependudukan->id_kecamatan = $request->kecamatan;
        $kependudukan->tahun =$request->tahun;
        $kependudukan->status = $request->status;
        $kependudukan->jumlah = $request->jumlah;
        $kependudukan->save();
        return redirect('admin/kependudukan')->with('status','Data Behasil Dimasukkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function show(Kependudukan $kependudukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id ==="") {
            return redirect('/admin/kependudukan')->with('status','Access Denied');
        }else{
            # code...
            $kependudukans = DB::table('kep_penduduk')
                        ->join('kecamatan_smgs','kep_penduduk.id_kecamatan','=','kecamatan_smgs.id_kecamatan')
                        ->where('kep_penduduk.id',$id)->get();
            // dd($kependudukans);
            if ($kependudukans!="") {
                # code...
                return view('/admin/kependudukan/edit',['kependudukans'=>$kependudukans]);
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
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'kecamatan' => 'required',
            'tahun' => 'required',
            'status' => 'required',
            'jumlah' =>'required',
        ]);
        $kependudukan = Kependudukan::find($id);
        $kependudukan->id_kecamatan = $request->kecamatan;
        $kependudukan->tahun =$request->tahun;
        $kependudukan->status = $request->status;
        $kependudukan->jumlah = $request->jumlah;
        $kependudukan->save();
        return redirect('admin/kependudukan')->with('status','Data Behasil Di ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kependudukan = Kependudukan::find($id);
        $kependudukan->delete();
        return redirect('admin/kependudukan')->with('status','Data Berhasil dihapus');
    }
    public function cd_kependudukan(){
        $kecamatans= Kecamatan::All();
        return view('admin/kependudukan/kependudukan_tambah',['kecamatans'=>$kecamatans]);

    }
}
