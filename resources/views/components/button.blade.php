<button {{ $attributes->merge([
    'class' => 'hover:shadow-lg disabled:opacity-25 active:shadow-inner active:scale-95 transform-gpu transition-all duration-150 outline-none focus:outline-none'
]) }}>
    {{ $slot }}
</button>
