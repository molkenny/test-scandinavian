<div
    x-data="{}"
>
    <div
        x-show="$wire.open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0"
        x-transition:enter-end="transform opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="transform opacity-100"
        x-transition:leave-end="transform opacity-0"
        tabindex="-1"
        role="dialog"
        aria-labelledby="tk-modal-simple"
        x-bind:aria-hidden="!$wire.open"
        class="fixed inset-0 p-4 lg:pt-20 overflow-x-hidden overflow-y-auto bg-gray-900 bg-opacity-75 z-100"
    >
        <!-- Modal Dialog -->
        <div
            class="flex flex-col w-full max-w-md mx-auto overflow-hidden bg-white rounded-custom shadow-sm md:w-1/2 lg:1/3"
            x-on:click.outside="$wire.open = false"
            x-on:keydown.escape.window="$wire.open = false"
            role="document"
        >
            <div class="flex items-center justify-between w-full px-5 py-4 lg:px-6">
                <h3 class="flex items-center space-x-2 text-white">
                    @if ($translation)
                        <span style="color: #9013FE">{{ $translation['full_key'] }}</span>
                    @endif
                </h3>
                <div class="-my-4">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center px-2 py-1 space-x-2 text-sm font-semibold leading-5 border border-transparent rounded focus:outline-none hover:text-gray-400 focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:text-gray-600"
                        style="color:#D9D9D9"
                        x-on:click="$wire.open = false"
                    >
                        <svg class="inline-block w-6 h-6 -mx-1 hi-solid hi-x" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    </button>
                </div>
            </div>
            <div class="w-full p-4">
                @if ($translation)
                <table class="w-full">
                    <thead></thead>
                    <tbody class="text-xs bg-white">
                        <tr>
                            <td class="w-1/2 px-4 py-2">English</td>
                            <td class="w-1/2 px-4 py-2">{{ $translation['text']['en'] }}</td>
                        </tr>
                        <tr style="background: #FBFBFB;">
                            <td class="w-1/2 px-4 py-2">Español</td>
                            <td class="w-1/2 px-4 py-2">{{ $translation['text']['es'] ?? $translation['text']['en'] }}</td>
                        </tr>
                        <tr>
                            <td class="w-1/2 px-4 py-2">Deutsch</td>
                            <td class="w-1/2 px-4 py-2">{{ $translation['text']['de'] ?? $translation['text']['en'] }}</td>
                        </tr>
                        <tr style="background: #FBFBFB;">
                            <td class="w-1/2 px-4 py-2">Français</td>
                            <td class="w-1/2 px-4 py-2">{{ $translation['text']['fr'] ?? $translation['text']['en'] }}</td>
                        </tr>
                        <tr>
                            <td class="w-1/2 px-4 py-2">Italiano</td>
                            <td class="w-1/2 px-4 py-2">{{ $translation['text']['it'] ?? $translation['text']['en'] }}</td>
                        </tr>
                        <tr style="background: #FBFBFB;">
                            <td class="w-1/2 px-4 py-2">Dansk</td>
                            <td class="w-1/2 px-4 py-2">{{ $translation['text']['da'] ?? $translation['text']['en'] }}</td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>

        <!-- END Modal Dialog -->
    </div>
</div>

