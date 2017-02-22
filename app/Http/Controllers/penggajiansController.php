<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Penggajian;
use App\Tunjangan_pegawai;
use App\Tunjangans;
use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use App\Lembur_pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class penggajiansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $gaji = Penggajian::all();
        return view('penggajians.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunjang = Tunjangans::all();
        $jab = Jabatan::all();
        $gol = Golongan::all();
        $pegawai = Pegawai::all();
        $lmbpegawai = Lembur_pegawai::all();
        $tunjangpegawai = Tunjangan_pegawai::all();

        return view('penggajians.create', compact('tunjang','tunjangpegawai', 'jab', 'gol', 'pegawai', 'lmbpegawai'));
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
        $penggajian = $request->all();
        /*$tunjang = Tunjangans::where('id', array('id'))->get();
        $tunjangpegawai = Tunjangan_pegawai::where('Kode_tunjangan_id', array('id'));
        $pegawai = Pegawai::where('id', array('id'))->get();
        $jam = Lembur_pegawai::where('id', array('id'))->get();
        $jamlembur = Tunjangan_pegawai::where('Kode_tunjangan_id', array('pegawai_id'));*/

        Penggajian::create($penggajian);
        return redirect('penggajian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tunjangpegawai = Tunjangan_pegawai::all();
        $jab = Jabatan::all();
        $gol = Golongan::all();
        $pegawai = Pegawai::all();
        $gaji = Penggajian::find($id);
        return view('tunjanganspegawai.edit', compact('tunjangpegawai', 'jab', 'gol', 'pegawai', 'gaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $gajiUpdate = Request::all();
        $gaji = Penggajian::find($id);
        $gaji->update($gajiUpdate);
        return redirect('penggajian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Penggajian::find($id)->delete();
        return redirect('penggajian');
    }
}
