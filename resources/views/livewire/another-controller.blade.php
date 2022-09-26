<div class="space-y-4">
    <nav class="container mx-auto px-4 py-6">
        <ul class="flex space-x-2">
            <li><a href="/" data-turbolinks-action="replace">Home</a></li>
            <li><a href="/edit" data-turbolinks-action="replace">Edit</a></li>
        </ul>
    </nav>

    <div class="container prose mx-auto mb-4">
        <h1>Rendering from App\Http\Livewire\AnotherController</h1>
        <p>Route: `/edit`</p>
    </div>

    <div class="container mx-auto" wire:ignore>
        <x-milkdown />
    </div>

    <div class="container mx-auto space-y-4" data-turbolinks-permanent>
        <div class="flex align-items-center space-x-4">
            <button wire:click="doSomething" type="button">EmitEvent</button>
        </div>

        <x-modal />
    </div>
</div>
