@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 2xl:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <x-button.muted :title="__('pagination.previous')" class="hidden" disabled/>
                    @else
                        <x-button.secondary :title="__('pagination.previous')" type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" loading="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before">
                            <x-slot:icon>
                                <x-icon.chevron-left class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.secondary>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <x-button.secondary iconPlacement="right" :title="__('pagination.next')" type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" loading="nextPage('{{ $paginator->getPageName() }}')"  x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before">
                            <x-slot:icon>
                                <x-icon.chevron-right class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.secondary>
                    @else
                        <x-button.muted :title="__('pagination.next')" class="hidden" disabled/>
                    @endif
                </span>
            </div>

            <div class="justify-between hidden sm:flex-1 2xl:flex sm:items-center">
                <div>
                    <p class="text-sm leading-5 text-zinc-600 dark:text-zinc-400">
                        <span>{!! __('Showing') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('to') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('of') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rounded-md">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <button disabled class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold border-l border-zinc-200 rounded-l-md border-y text-zinc-950 dark:text-zinc-50 bg-zinc-100 dark:bg-zinc-950 dark:border-zinc-800">
                                    <x-icon.chevron-left class="w-5 h-5"/>
                                </button>
                            @else
                                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" rel="prev" class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold border-l bg-zinc-100 border-zinc-200 border-y rounded-l-md text-zinc-950 dark:text-zinc-50 dark:bg-zinc-950 hover:bg-zinc-200 dark:hover:bg-zinc-800 focus:bg-zinc-200 focus:dark:bg-zinc-800 dark:border-zinc-800">
                                    <x-icon.chevron-left wire:loading.attr="hidden" wire:target="previousPage('{{ $paginator->getPageName() }}')" class="w-5 h-5"/>
                                    <x-loading wire:target="previousPage('{{ $paginator->getPageName() }}')" type="secondary" />
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <button disabled class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold bg-zinc-100 border-zinc-200 border-y text-zinc-950 dark:text-zinc-50 dark:bg-zinc-950 dark:border-zinc-800">
                                    {{ $element }}
                                </button>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <button disabled aria-current="page" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold bg-zinc-200 border-zinc-200 border-y text-zinc-950 dark:text-zinc-50 dark:bg-zinc-800 dark:border-zinc-800" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @else
                                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold bg-zinc-100 border-zinc-200 border-y text-zinc-950 dark:text-zinc-50 dark:bg-zinc-950 hover:bg-zinc-200 dark:hover:bg-zinc-800 focus:bg-zinc-200 focus:dark:bg-zinc-800 dark:border-zinc-800" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                <span wire:loading.attr="hidden" wire:target="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</span>
                                                <x-loading wire:target="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" type="secondary" />
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" rel="next"  class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold border-r bg-zinc-100 border-zinc-200 border-y rounded-r-md text-zinc-950 dark:text-zinc-50 dark:bg-zinc-950 hover:bg-zinc-200 dark:hover:bg-zinc-800 focus:bg-zinc-200 focus:dark:bg-zinc-800 dark:border-zinc-800">
                                    <x-icon.chevron-right wire:loading.attr="hidden" wire:target="nextPage('{{ $paginator->getPageName() }}')" class="w-5 h-5"/>
                                    <x-loading wire:target="nextPage('{{ $paginator->getPageName() }}')" type="secondary" />
                                </button>
                            @else
                                <button disabled class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold border-r border-zinc-200 rounded-r-md border-y text-zinc-950 dark:text-zinc-50 bg-zinc-100 dark:bg-zinc-950 dark:border-zinc-800">
                                    <x-icon.chevron-right class="w-5 h-5"/>
                                </button>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
