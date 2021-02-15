<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-4xl text-gray-500">Produtos</h1>

        <x-button.primary>
            <div class="flex items-center space-x-2">
                <x-icon.plus class="w-5 h-5"></x-icon.plus>
                <span>Criar Produto</span>
            </div>
        </x-button.primary>
    </div>


    <div class="rounded-xl overflow-hidden bg-white shadow">
        <table>
            <thead>
                <th class="text-left text-xs uppercase text-cool-gray-400 p-4"></th>
                <th class="text-left text-xs uppercase text-cool-gray-400 p-4">Product</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Price</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Created At</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Updated At</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Actions</th>
            </thead>
            <tbody>

                @foreach ($this->products as $product)

                    <tr class="odd:bg-cool-gray-50">

                        <td class="pl-4">
                            @if($product->image)
                                <div class="w-16 h-16 flex-shrink-0 rounded-lg overflow-hidden">
                                    <img class="object-cover w-full h-full" src="{{ $product->image }}" alt="Product Image">
                                </div>
                            @endif

                        </td>

                        <td class="text-cool-gray-900 px-4 py-2">
                            <div class="font-semibold capitalize">{{ $product->name }}</div>
                            <div class="text-xs text-cool-gray-500">{{ $product->description }}</div>
                        </td>

                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <span class="whitespace-pre">R$ {{ $product->price / 100 }}</span>
                        </td>

                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <span class="whitespace-pre">{{ $product->created_at->toFormattedDateString() }}</span>
                        </td>

                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <span class="whitespace-pre">{{ $product->updated_at->toFormattedDateString() }}</span>
                        </td>

                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <div class="flex items-center space-x-1">
                                <x-button class="w-7 h-7 p-1 text-primary-500 rounded-full bg-white border border-transparent hover:border-cool-gray-200 hover:bg-cool-gray-100">
                                    <x-icon.pencil-alt class="w-full h-full"></x-icon.pencil-alt>
                                </x-button>

                                <x-button class="w-7 h-7 p-1 text-red-400 rounded-full bg-white border border-transparent hover:border-red-400 hover:bg-red-400 hover:text-white">
                                    <x-icon.trash class="w-full h-full"></x-icon.trash>
                                </x-button>
                            </div>
                        </td>

                    </tr>

                @endforeach
            </tbody>
        </table>

        @if($this->products->hasPages())
            <div class="px-4 py-2">
                {{ $this->products->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
</div>
