<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function penerimaan()  
    {
        return $this->belongsTo(Penerimaan::class)->with(['barang','satuan']);
    }
    public function bagian()  
    {
        return $this->belongsTo(Bagian::class);
    }
    public static function pengeluarans($klasifikasi_id)
    {
        $haha = $klasifikasi_id;
        return Pengeluaran::with(['penerimaan','bagian'])
        ->orderBy('date')
        ->whereHas('penerimaan.barang', function($q) use($haha) {
            if($haha != null){
                $q->where('klasifikasi_id', $haha);
            }
        })
        ->get();
    }
}
