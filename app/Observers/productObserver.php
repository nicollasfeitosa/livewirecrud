<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class productObserver
{
    public function deleted(Product $product)
    {
        if($product->image) {
            $image = str_replace('storage/', '', $product->image);
            Storage::disk('public')->delete($image);
            Storage::disk('public')->deleteDirectory("products/$product->id");
        }
    }
}
