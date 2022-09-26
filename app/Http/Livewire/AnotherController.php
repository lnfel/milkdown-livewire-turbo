<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AnotherController extends Component
{
    public function doSomething()
    {
        dd('doing something');
    }

    public function render()
    {
        return view('livewire.another-controller')
            ->layout('layouts.main');
    }
}
