<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LingkunganHidup;
use App\Kecamatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LingkunganHidupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lingkunganHidups = LingkunganHidup::All();
        return view('admin/lingkunganHidup/index',['lingkunganHidups'=>$lingkunganHidups]);
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
            'tahun' => 'required',
            'jenis_rumah' => 'required',
            'debit_air' => 'required',
        ]);

        $lingkunganHidup = new LingkunganHidup;
        $lingkunganHidup->tahun = $request->tahun;
        $lingkunganHidup->jenis_rumah = $request->jenis_rumah;
        $lingkunganHidup->debit_air = $request->debit_air;
        $lingkunganHidup->save();
        return redirect('admin/lingkunganHidup')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LingkunganHidup  $lingkunganHidup
     * @return \Illuminate\Http\Response
     */
    public function show(LingkunganHidup $lingkunganHidup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LingkunganHidup  $lingkunganHidup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if ($id ==="") {
            return redirect('/admin/lingkunganHidup')->with('status','Access Denied');
        }else{
            # code...
            $lingkunganHidups = DB::table('lh_lingkungan')
                        ->where('lh_lingkungan.id',$id)->get();
            // dd($lingkungans);
            if ($lingkunganHidups!="") {
                # code...
                return view('/admin/lingkunganHidup/edit',['lingkunganHidups'=>$lingkunganHidups]);
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
     * @param  \App\LingkunganHidup  $lingkunganHidup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            
            'tahun' => 'required',
            'jenis_rumah' => 'required',
            'debit_air' => 'required',
        ]);
        $lingkunganHidup = LingkunganHidup::find($id);
        $lingkunganHidup->tahun = $request->tahun;
        $lingkunganHidup->jenis_rumah = $request->jenis_rumah;
        $lingkunganHidup->debit_air = $request->debit_air;
        $lingkunganHidup->save();
        return redirect('admin/lingkunganHidup')->with('status','Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LingkunganHidup  $lingkunganHidup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $lingkunganHidup = LingkunganHidup::find($id);
        $lingkunganHidup->delete();
        return redirect('admin/lingkunganHidup')->with('status','Data Berhasil dihapus');
    }

    public function cd_lingkunganHidup(){
       
        return view('admin/lingkunganHidup/lingkunganHidup_tambah');
    }
}
