<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-4xl text-gray-500">Produtos</h1>

        <x-button.primary wire:click="newProduct">
            <div class="flex items-center space-x-2">
                <x-icon.plus class="w-5 h-5"></x-icon.plus>
                <span>Criar Produto</span>
            </div>
        </x-button.primary>
    </div>

    <x-jet-dialog-modal title="Informações do Produto" wire:model="formModalOpened">
        <div class="space-y-4">

            <div>
                <x-jet-label for="image" class="mb-1" value="{{__('Imagen')}}"/>

                <div x-data>
                    @isset($image)
                        <div @click="$refs.input.click()" class="w-16 h-16 cursor-pointer overflow-hidden rounded-lg">
                            <img src="{{ $image->temporaryUrl() }}" class="object-cover w-full h-full" alt="Imagen do Produto">
                        </div>
                    @elseif(isset($form->image))
                        <div @click="$refs.input.click()" class="w-16 h-16 cursor-pointer overflow-hidden rounded-lg">
                            <img src="{{ $form->image }}" class="object-cover w-full h-full" alt="Imagen do Produto">
                        </div>
                    @else
                        <div @click="$refs.input.click()" class="w-16 h-16 cursor-pointer border-2 text-cool-gray-300 hover:text-cool-gray-500 hover:border-cool-gray-400 rounded-lg flex items-center justify-center transition-all duration-150">
                            <x-icon.camera class="w-8 h-8"></x-icon.camera>
                        </div>
                    @endif

                    <input type="file" wire:model="image" x-ref="input" class="hidden">
                </div>

                <x-jet-input-error for="image"></x-jet-input-error>
            </div>

            <div>
                <x-jet-label for="form.name" value="{{ __('Nome') }}"/>
                <x-jet-input id="form.name" type="text" placeholder="Nome do Produto" class="mt-1 block w-full" wire:model.dfer="form.name" autocomplete="name"/>
                <x-jet-input-error for="form.name" class="mt-1"></x-jet-input-error>
            </div>

            <div>
                <x-jet-label for="form.description" value="{{ __('Descrição') }}"/>
                <textarea id="form.description" wire:model.dfer="form.description" placeholder="Descrição" class="px-3 py-1.5 rounded-md border w-full shadow-sm outline-none focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-300 border-gray-300 focus:ring-opacity-50" rows="3"></textarea>
                <x-jet-input-error for="form.description"></x-jet-input-error>
            </div>

            <div>
                <x-jet-label for="form.price" value="{{ __('Preço') }}"/>
                <x-jet-input id="form.price" type="number" step="1" min="0" placeholder="Preço do Produto" class="mt-1 block w-full" wire:model.dfer="form.price" autocomplete="price"/>
                <x-jet-input-error for="form.price" class="mt-1"></x-jet-input-error>
            </div>

        </div>

        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')">Cancelar</x-button.white>
            <x-button.primary wire:click="save">Salvar</x-button.primary>
        </x-slot>

    </x-jet-dialog-modal>

    <x-jet-confirmation-modal title="Tem certeza?" wire:model="confirmationOpened">

        @if($productToRemove)
        <p>Você tem certeza que deseja remover <strong class="capitalize">{{ $productToRemove->name }}</strong>?</p>
        @endif

        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')">Cancelar</x-button.white>
            <x-button.red wire:click="remove">Sim, Confirmo</x-button.red>
        </x-slot>
    </x-jet-confirmation-modal>

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
                            @else
                                <div class="w-16 h-16 flex-shrink-0 rounded-lg overflow-hidden">
                                    <img class="object-cover w-full h-full" src="https://designshack.net/wp-content/uploads/placeholder-image.png" alt="Product Image">
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
                                <x-button wire:click="edit({{ $product->id }})" class="w-7 h-7 p-1 text-primary-500 rounded-full bg-white border border-transparent hover:border-cool-gray-200 hover:bg-cool-gray-100">
                                    <x-icon.pencil-alt class="w-full h-full"></x-icon.pencil-alt>
                                </x-button>

                                <x-button wire:click="confirmRemove({{ $product->id }})" class="w-7 h-7 p-1 text-red-400 rounded-full bg-white border border-transparent hover:border-red-400 hover:bg-red-400 hover:text-white">
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
