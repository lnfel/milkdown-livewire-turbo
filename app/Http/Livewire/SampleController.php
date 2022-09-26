<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SampleController extends Component
{
    protected $listeners = ['replySend'];
    public $count;
    public $comments;

    public function mount()
    {
        $this->count = 0;
        $this->comments = 5;
    }

    public function replySend()
    {
        // dd('replySend');
        $this->dispatchBrowserEvent('reply-sent', ['message' => 'Sample reply']);
    }

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.sample-controller')
            ->layout('layouts.main');
    }
}
