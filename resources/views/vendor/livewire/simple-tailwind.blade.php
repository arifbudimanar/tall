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
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <x-button.muted :title="__('pagination.previous')" class="hidden" disabled/>
                @else
                    @if(method_exists($paginator,'getCursorName'))
                        <x-button.secondary type="button" dusk="previousPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}" :title="__('pagination.previous')" wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')" loading="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}">
                            <x-slot:icon>
                                <x-icon.chevron-left class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.secondary>
                    @else
                        <x-button.secondary type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" loading="previousPage('{{ $paginator->getPageName() }}')" :title="__('pagination.previous')" x-on:click="{{ $scrollIntoViewJsSnippet }}"  dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}">
                            <x-slot:icon>
                                <x-icon.chevron-left class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.secondary>
                    @endif
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if(method_exists($paginator,'getCursorName'))
                        <x-button.secondary iconPlacement="right" type="button" dusk="nextPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}" wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')" loading="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')" :title="__('pagination.next')" x-on:click="{{ $scrollIntoViewJsSnippet }}">
                            <x-slot:icon>
                                <x-icon.chevron-right class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.secondary>
                    @else
                        <x-button.secondary iconPlacement="right" type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" loading="nextPage('{{ $paginator->getPageName() }}')" :title="__('pagination.next')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}">
                            <x-slot:icon>
                                <x-icon.chevron-right class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.secondary>
                    @endif
                @else
                    <x-button.muted :title="__('pagination.next')" class="hidden" disabled/>
                @endif
            </span>
        </nav>
    @endif
</div>
