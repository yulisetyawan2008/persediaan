<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masuk;
use App\Barang;
use App\Satuan;
use App\Penyedia;
use PDF;
use App\Exports\MasuksExport;
use Maatwebsite\Excel\Facades\Excel;

class MasukController extends Controller
{
    public function index(){
        $masuks = Masuk::all();
        return view('masuk.index', compact('masuks'));
    }

    public function create(){
        $penyedias = Penyedia::all();
        $barangs = Barang::all();
        $satuans = Satuan::all();
        return view('masuk.form', compact('penyedias', 'barangs', 'satuans'));
    }

    public function store(Request $request){
        $new_item = new Masuk;

        $new_item->no_transaksi = $request->no_transaksi;
        $new_item->tgl_transaksi = $request->tgl_transaksi;
        $new_item->barang_id = $request->barang_id;
        $new_item->satuan_id = $request->satuan_id;
        $new_item->jml_barang = $request->jml_barang;
        $new_item->hrg_satuan = $request->hrg_satuan;
        $new_item->hrg_total = $request->hrg_total;
        $new_item->penyedia_id = $request->penyedia_id;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/masuk');

    }

    public function edit($id){
        $masuk = Masuk::find($id);
        $barangs = Barang::all();
        $satuans = Satuan::all();
        $penyedias = Penyedia::all();
        return view('masuk.edit', compact('masuk', 'barangs', 'satuans', 'penyedias'));
    }

    public function update($id, Request $request){
        $new_item = Masuk::find($id);

        $new_item->no_transaksi = $request->no_transaksi;
        $new_item->tgl_transaksi = $request->tgl_transaksi;
        $new_item->barang_id = $request->barang_id;
        $new_item->satuan_id = $request->satuan_id;
        $new_item->jml_barang = $request->jml_barang;
        $new_item->hrg_satuan = $request->hrg_satuan;
        $new_item->hrg_total = $request->hrg_total;
        $new_item->penyedia_id = $request->penyedia_id;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/masuk');
    }

    public function destroy($id){
        $masuk = Masuk::find($id);
        $masuk->delete();
        return redirect('/masuk');
    }

    public function pdf(){
        $datas = Masuk::all();
        $pdf = PDF::loadView('masuk.pdf', compact('datas'));
        return $pdf->download('masuk.pdf');
    }

    public function export(){
        return Excel::download(new MasuksExport, 'masuks.xlsx');
    }

    Public function export_masuk(){
        return Excel::download(new MasuksExport, 'masuks.xlsx');
    }
}
