@if (!auth()->check())
<footer class="bg-secondary text-primary py-6 px-6">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-lg font-bold">Recetero</span>
        </div>
        <p class="text-primary/70 mt-4 md:mt-0">&copy; 2024 Recetero. All rights reserved.</p>
    </div>
</footer>
@else
<footer class="text-primary py-6 px-6 sm:bg-none bg-secondary">
    <div class="hidden sm:block">
        <div class="max-w-5xl mx-auto sm:flex flex-col md:flex-row items-center justify-between ">
            <div class="flex items-center gap-2">
                <span class="text-lg font-bold">Recetero</span>
            </div>
            <p class="text-primary/70 mt-4 md:mt-0">&copy; 2024 Recetero. All rights reserved.</p>
        </div>
    </div>
</footer>
@endif
