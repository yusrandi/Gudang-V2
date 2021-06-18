<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;

class Wirerekapitulasi extends Component
{
    public function resultData()
    {
            return Report::rekapitulasi()
            ->groupBy('penerimaan_id');
            // ->get()->sortby('penerimaan.barang_id');
    }
    public function render()
    {
        // dd($this->resultData());
        return view('livewire.wirerekapitulasi',[
            'reports' => $this->resultData()
        ]);
    }
}
