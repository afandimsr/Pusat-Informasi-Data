<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PenanggulanganBencana;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenanggulanganBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penanggulanganBencanas = PenanggulanganBencana::All();
        return view('admin/penanggulanganBencana/index',['penanggulanganBencanas'=>$penanggulanganBencanas]);
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
        // dd($_POST);
        $request->validate([
            'tanggal'=>'required',
            'penyebab'=>'required',
            'tempat_kebakaran'=>'required',
            'jumlah'=>'required',
        ]);
        $penanggulanganBencana = new PenanggulanganBencana;
        $penanggulanganBencana->tanggal = $request->tanggal;
        $penanggulanganBencana->penyebab = $request->penyebab;
        $penanggulanganBencana->tempat_kebakaran = $request->tempat_kebakaran;
        $penanggulanganBencana->jumlah = $request->jumlah;
        $penanggulanganBencana->save();
        return redirect('admin/penanggulanganBencana')->with('status','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PenanggulanganBencana  $penanggulanganBencana
     * @return \Illuminate\Http\Response
     */
    public function show(PenanggulanganBencana $penanggulanganBencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PenanggulanganBencana  $penanggulanganBencana
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($id ===""){
            return view('admin/404');
        }else{
            $penanggulanganBencanas = DB::table('pen_penanggulangan_bencanas')
                            ->where('pen_penanggulangan_bencanas.id',$id)
                            ->get();
                            // dd($penanggulanganBencanas);
            if($penanggulanganBencanas != null){
                return view('admin/penanggulanganBencana/edit',['penanggulanganBencanas'=>$penanggulanganBencanas]);
            }else{
                return view('admin/404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenanggulanganBencana  $penanggulanganBencana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'tanggal'=>'required',
            'penyebab'=>'required',
            'tempat_kebakaran'=>'required',
            'jumlah'=>'required',
        ]);
        $penanggulanganBencana =PenanggulanganBencana::find($id);
        $penanggulanganBencana->tanggal = $request->tanggal;
        $penanggulanganBencana->penyebab = $request->penyebab;
        $penanggulanganBencana->tempat_kebakaran = $request->tempat_kebakaran;
        $penanggulanganBencana->jumlah = $request->jumlah;
        $penanggulanganBencana->save();
        return redirect('admin/penanggulanganBencana')->with('status','Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenanggulanganBencana  $penanggulanganBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $penanggulanganBencana = PenanggulanganBencana::find($id);
        $penanggulanganBencana->delete();
        return redirect('admin/penanggulanganBencana')->with('status','Data Berhasil Dihapus');
    }
    public function cd_penanggulangan_bencana(){
        return view('admin/penanggulanganBencana/penanggulangan_bencana_tambah');
    }
}
