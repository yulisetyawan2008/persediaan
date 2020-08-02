<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    protected $fillable=[
        'no_trans', 'tgl_keluar', 'barang_id', 'satuan_id', 'jml_barang', 'hrg_barang', 'hrg_total', 'tujuan_id'
    ];

    public function satuan(){
        return $this->belongsTo('App\Satuan');
    }

    public function tujuan(){
        return $this->belongsTo('App\Tujuan');
    }

    public function barang(){
        return $this->belongsTo('App\Barang');
    }
}
