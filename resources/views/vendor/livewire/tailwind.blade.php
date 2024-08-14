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
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-500 bg-secondary-200 border border-secondary-300 cursor-default leading-5 rounded-md dark:bg-secondary-800 dark:border-secondary-600 dark:text-secondary-300 dark:focus:border-secondary-700 dark:active:bg-secondary-700 dark:active:text-secondary-300">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-secondary-700 bg-secondary-200 border border-secondary-300 leading-5 rounded-md hover:text-secondary-500 focus:outline-none focus:ring ring-secondary-300 focus:border-secondary-300 active:bg-secondary-100 active:text-secondary-700 transition ease-in-out duration-150 dark:bg-secondary-800 dark:border-secondary-600 dark:text-secondary-300 dark:focus:border-secondary-700 dark:active:bg-secondary-700 dark:active:text-secondary-300">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-secondary-700 bg-secondary-200 border border-secondary-300 leading-5 rounded-md hover:text-secondary-500 focus:outline-none focus:ring ring-secondary-300 focus:border-secondary-300 active:bg-secondary-100 active:text-secondary-700 transition ease-in-out duration-150 dark:bg-secondary-800 dark:border-secondary-600 dark:text-secondary-300 dark:focus:border-secondary-700 dark:active:bg-secondary-700 dark:active:text-secondary-300">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-secondary-500 bg-secondary-200 border border-secondary-300 cursor-default leading-5 rounded-md dark:text-secondary-600 dark:bg-secondary-800 dark:border-secondary-600">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-secondary-700 leading-5 dark:text-secondary-400">
                        <span>{!! __('Mostrando') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('a') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('de') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('resultados') !!}</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rtl:flex-row-reverse rounded-md shadow-sm">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-secondary-500 bg-secondary-200 border border-secondary-300 cursor-default rounded-l-md leading-5 dark:bg-secondary-800 dark:border-secondary-600" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-secondary-500 bg-secondary-200 border border-secondary-300 rounded-l-md leading-5 hover:text-secondary-400 focus:z-10 focus:outline-none focus:border-secondary-300 focus:ring ring-secondary-300 active:bg-secondary-100 active:text-secondary-500 transition ease-in-out duration-150 dark:bg-secondary-800 dark:border-secondary-600 dark:active:bg-secondary-700 dark:focus:border-secondary-800" aria-label="{{ __('pagination.previous') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-secondary-700 bg-secondary-200 border border-secondary-300 cursor-default leading-5 dark:bg-secondary-800 dark:border-secondary-600 dark:bg-secondary-800 dark:border-secondary-600">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-secondary-500 bg-secondary-200 border border-secondary-300 cursor-default leading-5 dark:bg-secondary-800 dark:border-secondary-600">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-secondary-700 bg-secondary-200 border border-secondary-300 leading-5 hover:text-secondary-500 focus:z-10 focus:outline-none focus:border-secondary-300 focus:ring ring-secondary-300 active:bg-secondary-100 active:text-secondary-700 transition ease-in-out duration-150 dark:bg-secondary-800 dark:border-secondary-600 dark:text-secondary-400 dark:hover:text-secondary-300 dark:active:bg-secondary-700 dark:focus:border-secondary-800" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-secondary-500 bg-secondary-200 border border-secondary-300 rounded-r-md leading-5 hover:text-secondary-400 focus:z-10 focus:outline-none focus:border-secondary-300 focus:ring ring-secondary-300 active:bg-secondary-100 active:text-secondary-500 transition ease-in-out duration-150 dark:bg-secondary-800 dark:border-secondary-600 dark:active:bg-secondary-700 dark:focus:border-secondary-800" aria-label="{{ __('pagination.next') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-secondary-500 bg-secondary-200 border border-secondary-300 cursor-default rounded-r-md leading-5 dark:bg-secondary-800 dark:border-secondary-600" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
