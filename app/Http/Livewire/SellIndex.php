<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sell;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SellIndex extends Component
{
    public $currentDate;
    public $sells;
    public $catProduct;

    public $totalSale = 0;
    public $totalProfit = 0;
    public $totalQuantity = 0;

    public $totalCatSale;
    public $totalProductSale;
    public $allSellVoucher;
    public $allSellByCustomer;

    public function render()
    {
        $this->currentDate = Carbon::now()->toDateString();
        $this->sells = Sell::whereDate('created_at', $this->currentDate)->with('product')->get();

        foreach($this->sells as $sell) {
            $this->totalSale += $sell->total_amount; 
            $profit = 0;
            foreach($sell->product as $productDetails) {
                $profit = ($productDetails->price - $productDetails->cost);
                $this->totalProfit += $profit;
                $this->totalQuantity += $productDetails->pivot->qunatity;
            }
        }

        $this->totalCatSale = Product::join('product_sell', 'product_sell.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('categories.term', Product::raw('SUM(products.price) as total_amount'), Product::raw('SUM(products.price - products.cost) as total_profit'))
            ->whereDate('product_sell.created_at', $this->currentDate)
            ->groupBy('categories.term')
            ->get();

        $this->totalProductSale = Product::join('product_sell', 'product_sell.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.id', Product::raw('SUM(products.price * product_sell.qunatity) as total_product_sell'), Product::raw('SUM(products.cost * product_sell.qunatity) as total_product_cost'), Product::raw('SUM((products.price - products.cost) * product_sell.qunatity) as total_product_profit'), Product::raw('SUM(product_sell.qunatity) as total_product_quantity'), Product::raw('MAX(products.code) as product_code'), Product::raw('MAX(products.name) as product_name'), Product::raw('MAX(categories.term) as product_category'), Product::raw('MAX(products.image) as product_image'))
            ->whereDate('product_sell.created_at', $this->currentDate)
            ->groupBy('products.id')
            ->get();

            $this->allSellVoucher = Sell::whereDate('created_at', $this->currentDate)->with(['product', 'customer', 'user'])->get();

            // $this->allSellByCustomer = Sell::whereDate('created_at', $this->currentDate)->with('customer')->get();

            $this->allSellByCustomer = Sell::join('customers', 'customers.id', '=', 'sells.customer_id')
            ->select('sells.customer_id', Sell::raw('SUM(sells.total_amount) as total_customer_amount'), Sell::raw('MAX(customers.name) as customer_name'), Sell::raw('MAX(customers.phone) as customer_phone'))
            ->whereDate('sells.created_at', $this->currentDate)
            ->groupBy('sells.customer_id')
            ->get();

        return view('livewire.sell-index');
    }
}
