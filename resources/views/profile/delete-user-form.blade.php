<x-action-section>
    <x-slot name="title">
        {{ __('Borrar cuenta') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Elimine permanentemente su cuenta.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-secondary/70">
            {{ __('Una vez que su cuenta se elimine, todos sus recursos y datos se eliminarán permanentemente.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Borrar cuenta') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Borrar cuenta') }}
            </x-slot>

            <x-slot name="content">
            {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
            <br>
            {{ __('Una vez que su cuenta se elimine, todos sus recursos y datos se eliminarán permanentemente.') }}
            <br>
            {{ __('Ingrese su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Contraseña') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Borrar cuenta') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
