<?php

namespace App\Http\Livewire;

use App\Models\Detak;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TabelDetak extends Component
{
    public $paginate = 5;

    public function render()
    {
        return view('livewire.tabel-detak', [
            'riwayat_detak' => Detak::where('user_id', '=', Auth::id())->latest()->get(),
        ]);
    }
}
