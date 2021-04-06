<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TekananDarah;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TabelTekanan extends Component
{

    public function render()
    {
        return view('livewire.tabel-tekanan', [
            'riwayat_tekanan' => TekananDarah::where('user_id', '=', Auth::id())->latest()->get(),
        ]);
    }
}
