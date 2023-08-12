<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductAdd extends Component {

    use WithFileUploads;

    public $name;
    public $code;
    public $tempImage;
    public $stock;
    public $cost;
    public $price;
    public $categoryList = [];
    public $selectedCategory;

    protected $rules = [
        'name' => 'required|min:6',
        'code' => 'required|min:4|integer',
        'tempImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'stock' => 'required|numeric',
        'cost' => 'required|numeric',
        'price' => 'required|numeric',
        'selectedCategory' => 'required'
    ];

    public function mount() {
        $this->categoryList = Category::all();
    }

    public function render() {
        return view('livewire.product-add');
    }

    public function AddProduct() {
        $this->validate();
        $image_url = $this->tempImage->storeAs('images', $this->name.'.'.$this->tempImage->extension(), 'public');
        $this->reset('tempImage');

        Product::create([
            'name' => $this->name,
            'code' => $this->code,
            'cost' => $this->cost,
            'price' => $this->price,
            'stock' => $this->stock,
            'category_id' => $this->selectedCategory,
            'image' => $image_url
        ]);
        flash()->addSuccess('Your product is deleted successfully.');
    }
}
