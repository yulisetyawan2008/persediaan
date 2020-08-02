<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tujuan;
use PDF;
use DB;
use App\Exports\TujuansExport;
use Maatwebsite\Excel\Facades\Excel;

class TujuanController extends Controller
{
    public function index(){
        $tujuans = DB::table('tujuans')->paginate(5);
        return view('tujuan.index', compact('tujuans'));
    }

    public function create(){
        return view('tujuan.form');
    }

    public function store(Request $request){
        $new_item = new Tujuan;

        $new_item->nm_tujuan = $request->nm_tujuan;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/tujuan');

    }

    public function edit($id){
        $tujuan = Tujuan::find($id);
        return view('tujuan.edit', compact('tujuan'));
    }

    public function update($id, Request $request){
        $tujuan = Tujuan::find($id);

        $tujuan->nm_tujuan = $request->nm_tujuan;
        $tujuan->created_at = $request->created_at;
        $tujuan->updated_at = $request->updated_at;

        $tujuan->save();

        return redirect('/tujuan');
    }

    public function destroy($id){
        $tujuan = Tujuan::find($id);
        $tujuan->delete();
        return redirect('/tujuan');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $tujuans = Tujuan::where('nm_tujuan', 'like', '%'.$search.'%')->paginate(5);
        return view('tujuan.index', compact('tujuans'));
    }

    public function pdf(){
        $datas = Tujuan::all();
        $pdf = PDF::loadView('tujuan.pdf', compact('datas'));
        return $pdf->download('tujuan.pdf');
    }

    public function export(){
        return Excel::download(new TujuansExport, 'tujuans.xlsx');
    }

}
