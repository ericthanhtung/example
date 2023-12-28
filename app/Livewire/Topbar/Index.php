<?php

namespace App\Livewire\Topbar;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['currentShop' => 'reloadPage'];

    public function render()
    {
        return view('livewire.topbar.index');
    }
}
