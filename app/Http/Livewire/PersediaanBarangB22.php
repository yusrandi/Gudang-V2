<?php

namespace App\Http\Livewire;

use App\Models\Klasifikasi;
use App\Models\Report;
use Carbon\Carbon;
use Livewire\Component;

class PersediaanBarangB22 extends Component
{
    public $filterTahun, $monthStart, $monthEnd, $startDate, $endDate, $klasifikasi_id;

    public function mount()
    {
        $this->filterTahun = Carbon::now()->year;
        $this->monthStart = '01';
        $this->monthEnd = '12';
        $this->startDate = date($this->filterTahun.'/'.$this->monthStart.'/00');
        $this->endDate = date($this->filterTahun.'/'.$this->monthEnd.'/28');
        
    }

    public function resultData()
    {
        $haha = $this->klasifikasi_id;
        $this->startDate = date($this->filterTahun.'/'.$this->monthStart.'/00');
        $this->endDate = date($this->filterTahun.'/'.$this->monthEnd.'/28');

        return Report::with('penerimaan')
            ->orderBy('date')
            // ->where(function ($query){
            
            //     if($this->klasifikasi_id != null){
            //         $query->Where('klasifikasi_id', $this->klasifikasi_id);
            //     }
            
            // })
            ->whereHas('penerimaan.barang', function($q) use($haha) {
            
            if($haha != null){
                $q->where('klasifikasi_id', $haha);
            }
            
        })
            ->WhereBetween('date', [$this->startDate, $this->endDate])
            ->get();
    }
    public function render()
    {
        // dd($this->resultData());
        return view('livewire.persediaan-barang-b22',[
            'klasifikasis' => Klasifikasi::orderBy('name')->get(),
            'reports' => $this->resultData()
        ]);
    }
}
