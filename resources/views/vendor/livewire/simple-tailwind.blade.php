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
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-500 bg-secondary-100 border border-secondary-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    @if(method_exists($paginator,'getCursorName'))
                        <button type="button" dusk="previousPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}" wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-700 bg-secondary-100 border border-secondary-300 leading-5 rounded-md hover:text-secondary-500 focus:outline-none focus:ring ring-secondary-300 focus:border-secondary-300 active:bg-secondary-200 active:text-secondary-700 transition ease-in-out duration-150">
                                {!! __('pagination.previous') !!}
                        </button>
                    @else
                        <button
                            type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-700 bg-secondary-100 border border-secondary-300 leading-5 rounded-md hover:text-secondary-500 focus:outline-none focus:ring ring-secondary-300 focus:border-secondary-300 active:bg-secondary-200 active:text-secondary-700 transition ease-in-out duration-150">
                                {!! __('pagination.previous') !!}
                        </button>
                    @endif
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if(method_exists($paginator,'getCursorName'))
                        <button type="button" dusk="nextPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}" wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-700 bg-secondary-100 border border-secondary-300 leading-5 rounded-md hover:text-secondary-500 focus:outline-none focus:ring ring-secondary-300 focus:border-secondary-300 active:bg-secondary-200 active:text-secondary-700 transition ease-in-out duration-150">
                                {!! __('pagination.next') !!}
                        </button>
                    @else
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-700 bg-secondary-100 border border-secondary-300 leading-5 rounded-md hover:text-secondary-500 focus:outline-none focus:ring ring-secondary-300 focus:border-secondary-300 active:bg-secondary-200 active:text-secondary-700 transition ease-in-out duration-150 dark:bg-secondary-800 dark:border-secondary-600">
                                {!! __('pagination.next') !!}
                        </button>
                    @endif
                @else
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-500 bg-secondary-100 border border-secondary-300 cursor-default leading-5 rounded-md dark:text-secondary-600 dark:bg-secondary-800 dark:border-secondary-600">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>

        {{-- Current Page Indicator --}}
        <div class="mt-4">
            <ul class="flex justify-center space-x-1">
                @foreach ($paginator->elements() as $element)
                    @if (is_string($element))
                        <li class="text-secondary-500">{{ $element }}</li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span class="px-4 py-2 text-sm font-medium text-white bg-secondary-600 border border-secondary-600 leading-5 rounded-md cursor-default">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <button type="button" wire:click="gotoPage({{ $page }})" class="px-4 py-2 text-sm font-medium text-secondary-700 bg-secondary-100 border border-secondary-300 leading-5 rounded-md hover:text-secondary-500 focus:outline-none focus:ring ring-secondary-300 focus:border-secondary-300 active:bg-secondary-200 active:text-secondary-700 transition ease-in-out duration-150">
                                        {{ $page }}
                                    </button>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
</div>
