<div class="space-y-4">
    <nav class="container mx-auto px-4 py-6">
        <ul class="flex space-x-2">
            <li><a href="/" data-turbolinks-action="replace">Home</a></li>
            <li><a href="/edit" data-turbolinks-action="replace">Edit</a></li>
        </ul>
    </nav>

    <div class="container prose mx-auto">
        <h1>Rendering from App\Http\Livewire\SampleController</h1>
        <p>Route: `/`</p>
    </div>

    <div class="container mx-auto" >
        <x-milkdown />
    </div>

    <div class="container mx-auto space-y-4">
        <div class="flex align-items-center space-x-4">
            <button wire:click="increment" type="button">EmitEvent</button>
            <input type="number" wire:model="count">
            <div>{{ $count }}</div>
        </div>

        <!-- For example we have many comments -->
        @for($i = 0; $i < $comments; $i++)
        <div>
            <h3>Comment {{$i + 1}}</h3>
            <x-modal />
        </div>
        @endfor
    </div>
</div>
