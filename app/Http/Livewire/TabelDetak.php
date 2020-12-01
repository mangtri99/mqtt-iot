<?php

namespace App\Http\Livewire;

use App\Models\Detak;
use Livewire\Component;
use Livewire\WithPagination;

class TabelDetak extends Component
{
    public $paginate = 5;

    public function render()
    {
        return view('livewire.tabel-detak', [
            'riwayat_detak' => Detak::latest()->get(),
        ]);
    }
}
