<?php

namespace App\Http\Livewire;

use App\Models\Suhu;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TabelSuhu extends Component
{
    use WithPagination;
    public $paginate = 5;
    // protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.tabel-suhu', [
            'riwayat_suhu' => Suhu::where('user_id', '=', Auth::id())->latest()->get(),
        ]);
    }
}
