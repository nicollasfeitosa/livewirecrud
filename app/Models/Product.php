<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public function updateImage(UploadedFile $image)
    {
        tap($this->image, function($previous) use ($image){
            $this->forceFill([
                'image' => 'storage/' . $image->storePublicly('products/' . $this->id, ['disk' => 'public'])
            ])->save();

            if($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }
}
