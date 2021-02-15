<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $formModalOpened = false;
    public Product $form;

    // Regras de validação
    public $rules = [
        'form.name' => 'required',
        'form.description' => 'required',
        'form.price' => 'required|integer|min:0',
    ];

    public function getProductsProperty()
    {
        return Product::latest('id')->paginate();
    }


    public function render()
    {
        return view('livewire.products');
    }

    public function newProduct()
    {
        $this->form = new Product();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function edit(Product $product)
    {
        $this->form = $product;
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function save()
    {
        $this->validate();
        $this->form->save();
        $this->formModalOpened = false;
    }
}
