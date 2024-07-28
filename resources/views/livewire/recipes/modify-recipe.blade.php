<div>
    <form wire:submit="save">
        {{ $this->form }}

        <button class="mt-5 bg-secondary-800 text-primary text-sm p-2 rounded hover:bg-secondary-900 hover:cursor-pointer" type="submit">
            Actualizar
        </button>
    </form>

    <x-filament-actions::modals />
</div>
