<div wire:ignore>
    <div class="milkdown-container space-y-4">
        <div class="editor"></div>
        <button class="clear-button" type="button">Clear</button>
    </div>

    {{--
        Use `@once` to run php code block only once
        This will allow us to push script confidently without duplications
        https://laravel.com/docs/9.x/blade#the-once-directive

        Using `data-turbolinks-eval="false"` prevents evaluating script for subsequent turbolinks visits
        We can also take advantage of `turbolinks:load` event because of this
        https://github.com/turbolinks/turbolinks#working-with-script-elements

        We are expecting to use many instance of milkdown on a single page so we won't use
        any id for each one, instead we define a single class and iterate through them every time
        we visit a link via `turbolinks:load`.

        This way we don't need to worry about the context of each milkdown component
    --}}
    @once
        @push('scripts')
            <script data-turbolinks-eval="false">
                document.addEventListener('turbolinks:load', function() {
                    document.querySelectorAll('.milkdown-container').forEach(async (element) => {

                        // Turbolinks caches the html so we need to check and remove previous
                        // editor when using back and forward browser navigation buttons.
                        //
                        // Additionally turbolinks only caches html and not the javascript state
                        // so preserving editor between navigation loses its context and functionality.
                        //
                        // The only thing we could do is tear the editor apart and build it again on each page visit.
                        const milkdownWrapper = element.querySelector('.editor .milkdown-menu-wrapper')
                        if (milkdownWrapper) {
                            milkdownWrapper.parentNode.innerHTML = ''
                        }

                        const editor = await milkdown.Editor
                            .make()
                            .config((ctx) => {
                                ctx.set(milkdown.rootCtx, element.querySelector('.editor'))
                            })
                            .use(theme.nord)
                            .use(preset.commonmark)
                            .use(milkdownPlugin.menu)
                            .use(milkdownPlugin.prism)
                            .create()

                        // Sample action for each component
                        element.querySelector('.clear-button').addEventListener('click', () => {
                            editor.action(milkdownUtils.replaceAll(''))
                        })
                    })
                })
            </script>
        @endpush
    @endonce
</div>