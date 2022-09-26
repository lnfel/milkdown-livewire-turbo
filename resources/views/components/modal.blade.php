<div wire:ignore>
    <div class="modal-container space-y-4">
        <div class="flex align-items-center space-x-2">
            <button class="modal-button" type="button">Modal</button>
            <button class="reply-button" type="button">Reply</button>
        </div>

        <div class="editor-container hidden">
            <x-milkdown />
        </div>
    </div>

    @once
        @push('scripts')
        <script data-turbolinks-eval="false">
            document.addEventListener("turbolinks:load", function() {

                document.querySelectorAll('.modal-container').forEach((element) => {
                    let modalOpen = false

                    element.addEventListener('toggleModal', (event) => {
                        console.log('toggleModal was fired: ', event.detail.modalOpen)
                        modalOpen = event.detail.modalOpen
                        toggleModal(element, modalOpen)
                    })

                    // https://developer.mozilla.org/en-US/docs/Web/Events/Creating_and_triggering_events
                    element.querySelector('.modal-button').addEventListener('click', (event) => {
                        // console.log('modalButton clicked')
                        const modalEvent = new CustomEvent('toggleModal', {
                            detail: {
                                modalOpen: !modalOpen
                            }
                        })
                        modalOpen = !modalOpen
                        element.dispatchEvent(modalEvent)
                    })

                    function toggleModal(element, open) {
                        open 
                            ? element.querySelector('.editor-container').classList.remove('hidden')
                            : element.querySelector('.editor-container').classList.add('hidden')
                    }

                    element.querySelector('.reply-button').addEventListener('click', () => {
                        console.log('reply button clicked')
                        Livewire.emit('replySend', 'some data')
                    })
                })
            })

            // Listen for `dispatchBrowserEvent` fired from livewire controller.
            //
            // NOTE: do not put window.addEventListener inside `turbolinks:load`
            // or `livewire:load` or it would add event listeners everytime we navigate
            // pages. Always put this type of listener inside {{-- @once @endpush --}} directive
            // so it would only initialize once
            //
            // https://laravel-livewire.com/docs/2.x/events#browser
            window.addEventListener('reply-sent', (event) => {
                console.log(event.detail.message)
            })
        </script>
        @endpush
    @endonce
</div>
