<div role="status" id="toaster" x-data="toasterHub(@js($toasts), @js($config))" @class([
    'fixed z-50 p-4 w-full flex flex-col pointer-events-none sm:p-6',
    'bottom-0' => $alignment->is('bottom'),
    'top-1/2 -translate-y-1/2' => $alignment->is('middle'),
    'top-0' => $alignment->is('top'),
    'items-start rtl:items-end' => $position->is('left'),
    'items-center' => $position->is('center'),
    'items-end rtl:items-start' => $position->is('right'),
])>
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.isVisible" x-init="$nextTick(() => toast.show($el))" @if ($alignment->is('bottom'))
            x-transition:enter-start="translate-y-12 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
        @elseif($alignment->is('top'))
            x-transition:enter-start="-translate-y-12 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
        @else
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            @endif
            x-transition:leave-end="opacity-0 scale-90"
            @class([
                'relative duration-300 transform transition ease-in-out sm:max-w-sm w-full pointer-events-auto',
                'text-center' => $position->is('center'),
            ])
            :class="toast.select({
                error: 'text-red-900 dark:text-red-100',
                info: 'text-zinc-900 dark:text-zinc-100',
                success: 'text-indigo-900 dark:text-indigo-100',
                warning: 'text-orange-900 dark:text-orange-100'
            })"
            >
            <i x-text="toast.message"
                class="inline-block select-none not-italic pl-4 pr-8 py-4 rounded-md text-sm w-full {{ $alignment->is('bottom') ? 'mt-3' : 'mb-3' }}"
                :class="toast.select({
                    error: 'bg-red-100 dark:bg-red-950 border border-red-200 dark:border-red-800',
                    info: 'bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800',
                    success: 'bg-indigo-100 dark:bg-indigo-950 border border-indigo-200 dark:border-indigo-800',
                    warning: 'bg-orange-100 dark:bg-orange-950 border border-orange-200 dark:border-orange-800'
                })"></i>

            @if ($closeable)
                <button x-on:click="toast.dispose()"sm: aria-label="@lang('close')"
                    class="absolute right-0 p-4  rtl:right-auto rtl:left-0 transform translate-y-1 {{ $alignment->is('bottom') ? 'top-3' : 'top-1/2' }}">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            @endif
        </div>
    </template>
</div>
