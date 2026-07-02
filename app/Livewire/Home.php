<?php

namespace App\Livewire;

use App\Models\FutureMap;
use Livewire\Component;

class Home extends Component
{
    public int $futureMapCount = 0;

    public int $commitmentCount = 0;

    public function mount(): void
    {
        $this->futureMapCount = FutureMap::count();
        $this->commitmentCount = FutureMap::whereNotNull('komitmen_berani')->count();
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.app', ['title' => 'Beranda']);
    }
}
