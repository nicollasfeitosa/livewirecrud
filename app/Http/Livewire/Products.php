<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Product $productToRemove = null;
    public ?Product $form = null;

    /** @var TemporaryUploadedFile */
    public $image = null;

    // Regras de validação
    protected $rules = [
        'form.name' => 'required',
        'form.description' => 'required',
        'form.price' => 'required|integer|min:0',
    ];

    protected $validationAttributes = [
        'form.name' => 'nome',
        'form.description' => 'descrição',
        'form.price' => 'preço',
    ];

    public function getProductsProperty()
    {
        return Product::latest('id')->paginate();
    }

    public function newProduct()
    {
        $this->form = new Product();
        $this->formModalOpened = true;
        $this->image = null;
        $this->clearValidation();
    }

    public function edit(Product $product)
    {
        $this->form = $product;
        $this->formModalOpened = true;
        $this->image = null;
        $this->clearValidation();
    }

    public function save()
    {
        $this->validate();
        $this->form->save();
        $this->formModalOpened = false;

        if ($this->image) {
            $this->form->updateImage($this->image); // TempoparyUploadFile é uma subclasse do UploadFile portanto não é um erro =)
        }

    }

    public function confirmRemove(Product $product)
    {
        $this->productToRemove = $product;
        $this->confirmationOpened = true;
    }

    public function remove()
    {
        $this->productToRemove->delete();
        $this->confirmationOpened = false;
        $this->form = null;
    }

    public function render()
    {
        return view('livewire.products');
    }
}
