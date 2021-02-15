<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public function getProductsProperty()
    {
        return Product::latest('id')->paginate();
    }


    public function render()
    {
        return view('livewire.products');
    }
}
