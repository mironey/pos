<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductShow extends Component
{

    use WithFileUploads;

    public $productId;
    public $productArr;

    public function mount() {
        $this->productArr = Product::findOrFail($this->productId);
    }

    public function render() {
        return view('livewire.product-show');
    }
    
}
