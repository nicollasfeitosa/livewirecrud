<x-button {{ $attributes->merge([
    'class' => 'text-sm px-4 py-2 rounded-lg text-white hover:bg-primary-600 bg-primary-500'
]) }}> {{ $slot }} </x-button>
