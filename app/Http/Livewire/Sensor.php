<?php

namespace App\Http\Livewire;

use App\Models\Suhu;
use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

class Sensor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // public $currentPage = 1;
    // public $model = 'haiiii';
    public function render()
    {
        return view('livewire.sensor', [
            'data' => Suhu::latest()->paginate(5)
        ]);
    }

    // public function setPage($url)
    // {
    //     $this->currentPage = explode('page=', $url)[1];
    //     Paginator::currentPageResolver(function () {
    //         return $this->currentPage;
    //     });
    // }
}
