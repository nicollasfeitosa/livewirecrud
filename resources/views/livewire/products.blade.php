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
                <tr class="odd:bg-cool-gray-50">

                    <td class="pl-4">
                        <div class="w-16 h-16 flex-shrink-0 rounded-lg overflow-hidden">
                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80" alt="Product Image">
                        </div>
                    </td>

                    <td class="text-cool-gray-900 px-4 py-2">
                        <div class="font-semibold capitalize">ProductName</div>
                        <div class="text-xs text-cool-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda vero autem vel amet, repellendus quod. Impedit eum eligendi labore, et obcaecati ipsa ducimus similique. Quod voluptatibus a atque deleniti! Cumque!</div>
                    </td>

                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        <span class="whitespace-pre">R$ 400,00</span>
                    </td>

                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        <span class="whitespace-pre">created at</span>
                    </td>

                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        <span class="whitespace-pre">updated at</span>
                    </td>

                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        icons
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
