<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyedia;
use DB;
use App\Exports\PenyediasExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PenyediaController extends Controller
{
    public function index(){
        $penyedias = DB::table('penyedias')->paginate(5);
        return view('penyedia.index', compact('penyedias'));
    }

    public function create(){
        return view('penyedia.form');
    }

    public function store(Request $request){
        $new_item = new Penyedia;

        $new_item->nm_penyedia = $request->nm_penyedia;
        $new_item->created_at = $request->created_at;
        $new_item->updated_at = $request->updated_at;

        $new_item->save();

        return redirect('/penyedia');

    }

    public function search(Request $request){
        $search = $request->get('search');
        $penyedias = Penyedia::where('nm_penyedia', 'like', '%'.$search.'%')->paginate(5);
        return view('penyedia.index', compact('penyedias'));
    }

    public function edit($id){
        $penyedia = Penyedia::find($id);
        return view('penyedia.edit', compact('penyedia'));
    }

    public function update($id, Request $request){
        $penyedia = Penyedia::find($id);

        $penyedia->nm_penyedia = $request->nm_penyedia;
        $penyedia->created_at = $request->created_at;
        $penyedia->updated_at = $request->updated_at;

        $penyedia->save();

        return redirect('/penyedia');

    }

    public function destroy($id){
        $penyedia = Penyedia::find($id);
        $penyedia->delete();
        return redirect('/penyedia');
    }

    public function pdf(){
        $datas = Penyedia::all();
        $pdf = PDF::loadView('penyedia.pdf', compact('datas'));
        return $pdf->download('penyedia.pdf');
    }

    public function export(){
        return Excel::download(new PenyediasExport, 'penyedias.xlsx');
    }

}
