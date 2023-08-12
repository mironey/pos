<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    public function render() {
        return view('livewire.product-index', [
            'products' => Product::paginate(10),
        ]);
    }

    public function ProductDelete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        flash()->addSuccess('Your product is deleted successfully.');
    }
}
