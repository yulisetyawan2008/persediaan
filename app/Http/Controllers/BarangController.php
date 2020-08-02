<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use DB;
use PDF;
use App\Exports\BarangsExport;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function index(){
        $barangs = DB::table('barangs')->paginate(5);
        return view('barang.index', compact('barangs'));
    }

    public function create(){
        return view('barang.form');
    }

    public function store(Request $request){
        $new_item = new Barang;

        $new_item->nm_barang = $request->nm_barang;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/barang');

    }

    public function edit($id){
        $barang = Barang::find($id);
        // dd($barang);
        return view('barang.edit', compact('barang'));
    }

    public function update($id, Request $request){
        $barang = Barang::find($id);
        // dd($barang);
        $barang->nm_barang = $request->nm_barang;
        $barang->created_at = $request->created_at;
        $barang->updated_at = $request->updated_at;

        $barang->save();

        return redirect('/barang');
    }

    public function destroy($id){
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $barangs = Barang::where('nm_barang', 'like', '%'.$search.'%')->paginate(5);
        return view('barang.index', compact('barangs'));
    }

    public function pdf(){
        $datas = Barang::all();
        $pdf = PDF::loadView('barang.pdf', compact('datas'));
        return $pdf->download('barang.pdf');
    }

    public function export(){
        return Excel::download(new BarangsExport, 'barangs.xlsx');
    }

}
