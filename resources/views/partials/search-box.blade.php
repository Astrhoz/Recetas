<div x-data="{
    query: '{{ request('search', '') }}',
    search() {
        if (this.query.trim() !== '') {
            window.location.href = '/?search=' + encodeURIComponent(this.query);
        }
    }
}" id="search-box" class="flex-1 items-center w-full py-2">
    <div class="relative text-secondary-900 w-[45vw] lg:w-[20vw] sm:w-[25vw]">
        <x-bytesize-search class="absolute h-4 w-4 left-2.5 top-2.5" />
        <input x-model="query" x-on:keydown.enter="search" type="text" placeholder="Buscar recetas..."
            class="w-full bg-secondary-200 shadow-none border-none pl-8 pr-4 rounded-l-md focus:ring-2 focus:ring-primary-200 placeholder:text-secondary-300 h-9" />
        <button x-on:click="search"
            class="absolute bg-secondary-500 text-primary px-3 py-1 h-9 rounded-r-md hover:bg-secondary-600 focus:outline-none focus:ring-2 focus:ring-primary-200">
            Buscar
        </button>
    </div>
</div>
