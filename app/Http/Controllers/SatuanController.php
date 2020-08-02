<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satuan;
use PDF;
use App\Exports\SatuansExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class SatuanController extends Controller
{
    public function index(){
        $satuans = DB::table('satuans')->paginate(5);
        return view('satuan.index', compact('satuans'));
    }

    public function create(){
        return view('satuan.form');
    }

    public function store(Request $request){
        $new_item = new Satuan;

        $new_item->nm_satuan = $request->nm_satuan;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/satuan');

    }

    public function edit($id){
        $satuan = Satuan::find($id);
        return view('satuan.edit', compact('satuan'));
    }

    public function update($id, Request $request){
        $satuan = Satuan::find($id);

        $satuan->nm_satuan = $request->nm_satuan;
        $satuan->created_at = $request->created_at;
        $satuan->updated_at = $request->updated_at;

        $satuan->save();

        return redirect('/satuan');
    }

    public function destroy($id){
        $satuan = Satuan::find($id);
        $satuan->delete();
        return redirect('/satuan');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $satuans = Satuan::where('nm_satuan', 'like', '%'.$search.'%')->paginate(5);
        return view('satuan.index', compact('satuans'));
    }

    public function pdf(){
        $datas = Satuan::all();
        $pdf = PDF::loadView('satuan.pdf', compact('datas'));
        return $pdf->download('satuan.pdf');
    }

    public function export(){
        return Excel::download(new SatuansExport, 'satuans.xlsx');
    }
}
