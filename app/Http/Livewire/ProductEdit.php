<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component {

    use WithFileUploads;

    public $productArr;
    public $productId;
    public $name;
    public $code;
    public $tempImage;
    public $image;
    public $stock;
    public $cost;
    public $price;
    public $categoryList = [];
    public $selectedCategory;

    protected $rules = [
        'name' => 'required|min:6',
        'code' => 'required|min:4|integer',
        'tempImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'stock' => 'required|integer',
        'cost' => 'required|integer',
        'price' => 'required|integer',
        'selectedCategory' => 'required'
    ];

    public function mount() {
        $this->productArr = Product::findOrFail($this->productId);
        $this->categoryList = Category::all();

        $this->name = $this->productArr->name;
        $this->code = $this->productArr->code;
        $this->image = $this->productArr->image;
        $this->stock = $this->productArr->stock;
        $this->cost = $this->productArr->cost;
        $this->price = $this->productArr->price;
        $this->selectedCategory = $this->productArr->category->id;
    }

    public function render() {
        return view('livewire.product-edit');
    }

    public function SaveProduct() {
        $this->validate();

        $image_url = $this->tempImage->storeAs('images', $this->name.'.'.$this->tempImage->extension(), 'public');
        $this->reset('tempImage');
        
        $this->productArr->name = $this->name;
        $this->productArr->code = $this->code;
        $this->productArr->cost = $this->cost;
        $this->productArr->price = $this->price;
        $this->productArr->stock = $this->stock;
        $this->productArr->category_id = $this->selectedCategory;
        $this->productArr->image = $image_url;
        $this->productArr->save();

        $this->image = "";

        flash()->addSuccess('Your product is updated successfully.');
        return redirect()->route('product.index');

    }
}
