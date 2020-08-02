<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluar;
use App\Barang;
use App\Satuan;
use App\Tujuan;
use PDF;
use App\Exports\KeluarsExport;
use Maatwebsite\Excel\Facades\Excel;

class KeluarController extends Controller
{
    public function index(){
        $keluars = Keluar::all();
        return view('keluar.index', compact('keluars'));
    }

    public function create(){
        $satuans = Satuan::all();
        $barangs = Barang::all();
        $tujuans = Tujuan::all();
        return view('keluar.form', compact('satuans', 'barangs', 'tujuans'));
    }

    public function store(Request $request){
        $new_item = new Keluar;

        $new_item->no_trans = $request->no_trans;
        $new_item->tgl_keluar = $request->tgl_keluar;
        $new_item->barang_id = $request->barang_id;
        $new_item->satuan_id = $request->satuan_id;
        $new_item->jml_barang = $request->jml_barang;
        $new_item->hrg_satuan = $request->hrg_satuan;
        $new_item->hrg_total = $request->hrg_total;
        $new_item->tujuan_id = $request->tujuan_id;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/keluar');

    }

    public function edit($id){
        $keluar = Keluar::find($id);
        $barangs = Barang::all();
        $satuans = Satuan::all();
        $tujuans = Tujuan::all();
        return view('keluar.edit', compact('keluar', 'barangs', 'satuans', 'tujuans'));
    }

    public function update($id, Request $request){
        $new_item = Keluar::find($id);

        $new_item->no_trans = $request->no_trans;
        $new_item->tgl_keluar = $request->tgl_keluar;
        $new_item->barang_id = $request->barang_id;
        $new_item->satuan_id = $request->satuan_id;
        $new_item->jml_barang = $request->jml_barang;
        $new_item->tujuan_id = $request->tujuan_id;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/keluar');

    }

    public function destroy($id){
        $keluar = Keluar::find($id);
        $keluar->delete();
        return redirect('/keluar');
    }

    public function pdf(){
        $datas = Keluar::all();
        $pdf = PDF::loadView('keluar.pdf', compact('datas'));
        return $pdf->download('keluar.pdf');
    }

    public function export(){
        return Excel::download(new KeluarsExport, 'keluars.xlsx');
    }

}
