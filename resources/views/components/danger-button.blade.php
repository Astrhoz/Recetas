<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent bg-red-700 rounded-md font-semibold text-xs text-primary tracking-widest hover:bg-red-800 focus:bg-secondary-600 active:bg-secondary-600 focus:outline-none disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
