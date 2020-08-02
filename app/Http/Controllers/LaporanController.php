<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Satuan;
use App\Barang;
use App\Penyedia;
use App\Masuk;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporansExport;
use App\Exports\MasuksExport;

class LaporanController extends Controller
{
    public function index(){
        return view('laporan.index');
    }

    public function cari(Request $request){
        $this->validate($request,[
            'dari'=>'required',
            'sampai'=>'required'
        ]);

        $dari = date('Y-m-d',strtotime($request->dari));
        // dd($dari);
        $sampai = date('Y-m-d',strtotime($request->sampai));
        // dd($sampai);
        $masuks = DB::table('masuks')
                    ->join('satuans', 'masuks.satuan_id', '=', 'satuans.id')
                    ->join('barangs', 'masuks.barang_id', '=', 'barangs.id')
                    ->join('penyedias', 'masuks.penyedia_id', '=', 'penyedias.id')
                    ->whereBetween('tgl_transaksi', [$dari, $sampai])
                    ->get();
        $totals = DB::table('masuks')
                    ->join('satuans', 'masuks.satuan_id', '=', 'satuans.id')
                    ->join('barangs', 'masuks.barang_id', '=', 'barangs.id')
                    ->join('penyedias', 'masuks.penyedia_id', '=', 'penyedias.id')
                    ->whereBetween('tgl_transaksi', [$dari, $sampai])
                    ->sum('hrg_total');
        $keluars = DB::table('keluars')
                    ->join('satuans', 'keluars.satuan_id', '=', 'satuans.id')
                    ->join('barangs', 'keluars.barang_id', '=', 'barangs.id')
                    ->join('tujuans', 'keluars.tujuan_id', '=', 'tujuans.id')
                    ->whereBetween('tgl_keluar', [$dari, $sampai])
                    ->get();
        $tots = DB::table('keluars')
                    ->join('satuans', 'keluars.satuan_id', '=', 'satuans.id')
                    ->join('barangs', 'keluars.barang_id', '=', 'barangs.id')
                    ->join('tujuans', 'keluars.tujuan_id', '=', 'tujuans.id')
                    ->whereBetween('tgl_keluar', [$dari, $sampai])
                    ->sum('hrg_total');
        // dd($masuks);

        return view('laporan.index', compact('masuks', 'keluars', 'totals', 'tots', 'dari', 'sampai'));
    }

    public function export_masuk($dari, $sampai){
        $title = 'Laporan Barang Masuk';
        $masuks = DB::table('masuks')
                ->join('satuans', 'masuks.satuan_id', '=', 'satuans.id')
                ->join('barangs', 'masuks.barang_id', '=', 'barangs.id')
                ->join('penyedias', 'masuks.penyedia_id', '=', 'penyedias.id')
                ->whereBetween('tgl_transaksi', [$dari, $sampai])
                ->get();
        $totals = DB::table('masuks')
                ->join('satuans', 'masuks.satuan_id', '=', 'satuans.id')
                ->join('barangs', 'masuks.barang_id', '=', 'barangs.id')
                ->join('penyedias', 'masuks.penyedia_id', '=', 'penyedias.id')
                ->whereBetween('tgl_transaksi', [$dari, $sampai])
                ->sum('hrg_total');
        Excel::download($title, function($excel) use ($masuks, $totals){
            $excel->sheet('Sheetname', function($sheet) use($masuks, $totals){
                $sheet->loadview('laporan.laporan_masuk_excel')
                        ->with('masuks', $masuks)
                        ->with('totals', $totals);
            });
        })->export('xlsx');
    }

}
