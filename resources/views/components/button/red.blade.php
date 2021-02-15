<x-button {{ $attributes->merge([
    'class' => 'text-sm px-4 py-2 rounded-lg text-white hover:bg-red-600 bg-red-500'
]) }}> {{ $slot }} </x-button>
