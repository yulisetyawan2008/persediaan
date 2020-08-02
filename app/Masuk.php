<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    protected $fillable=[
        'no_transaksi', 'tgl_transaksi', 'barang_id', 'satuan_id', 'jml_barang', 'hrg_satuan', 'hrg_total', 'penyedia_id'
    ];

    public function satuan(){
        return $this->belongsTo('App\Satuan');
    }

    public function penyedia(){
        return $this->belongsTo('App\Penyedia');
    }

    public function barang(){
        return $this->belongsTo('App\Barang');
    }
}
