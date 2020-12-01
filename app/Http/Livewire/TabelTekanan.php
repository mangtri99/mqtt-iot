<?php

namespace App\Http\Livewire;

use App\Models\TekananDarah;
use Livewire\Component;
use Livewire\WithPagination;

class TabelTekanan extends Component
{

    public function render()
    {
        return view('livewire.tabel-tekanan', [
            'riwayat_tekanan' => TekananDarah::latest()->get(),
        ]);
    }
}
