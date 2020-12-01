<?php

namespace App\Http\Livewire;

use App\Models\Suhu;
use Livewire\Component;
use Livewire\WithPagination;

class TabelSuhu extends Component
{
    use WithPagination;
    public $paginate = 5;
    // protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.tabel-suhu', [
            'riwayat_suhu' => Suhu::latest()->get(),
        ]);
    }
}
