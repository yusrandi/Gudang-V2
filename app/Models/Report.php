<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function penerimaan()  
    {
        return $this->belongsTo(Penerimaan::class)->with(['barang','satuan']);
    }
    public function pengeluaran()  
    {
        return $this->belongsTo(Pengeluaran::class)->with(['barang','satuan']);
    }
    
    public static function rekapitulasi()
    {
         return Report::with('penerimaan')
            ->get()->sortby('penerimaan.barang_id');

    }

}
