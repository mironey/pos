<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sell;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TestIndex extends Component
{
    public $product;
    public $product1;
    public $product2;
    public $product3;

    public $sell;

    public function render()
    {
        //$this->result1 = DB::table('categories')->get();
        //$this->category = DB::table('categories')->where('name', 'Groceries')->first();
        //$this->product = DB::table('products')->where('code', '1204')->value('price');
        //$this->product = DB::table('products')->pluck('name', 'code');
        //$this->product = DB::table('products')->where('category_id', '11')->doesntExist();
       // $this->product = DB::table('products')->select('name', 'code as product_code')->get();
      //  $query = DB::table('products')->select('name');
        //$this->product = $query->addSelect('code')->get();
        //$this->product = DB::table('products')->where('price', '>', '850')->get();
       // $this->product = DB::table('products')->select(DB::raw('count(*) as product_count, price'))->where('price', '<', 850)->groupBy('price')->get();
    //    $this->product = DB::table('products')
    //    ->join('product_sell', 'product_id', '=', 'products.id')
    //    ->join('categories', 'categories.id', '=', 'products.category_id')
    //    ->select('products.*', 'product_sell.qunatity', 'categories.name')->get();
    // $this->product = DB::table('products')
    // ->join('product_sell', function(JoinClause $join){
    //     $join->on('product_id', '=', 'products.id')
    //     ->where('products.id', '<', 15);
    // })
    // ->get();

    /* 
    $currentDate = Carbon::now()->toDateString();
    $this->product = DB::table('products')
        ->join('product_sell', 'product_id', '=', 'products.id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'product_sell.qunatity', 'categories.term')
        ->whereDate('product_sell.created_at', $currentDate)
        ->get();
    */

   // $this->product = DB::table('products')->where('price', '<', 850)->where('cost', '>', 400)->get();

   //$string = 'Possimus';
   //$this->product = DB::table('products')->where('name', 'like', '%'.$string.'%')->get();

//    $this->product = DB::table('products')->where([
//     ['cost', '<', 850],
//     ['price', '>', 900]
//    ])->get();

    // $this->product = DB::table('products')
    //     ->where('price', '<', 830)
    //     ->orWhere('stock', 71)
    //     ->get();

    //$this->product = DB::table('products')->whereNotBetween('price', [800, 850])->get();

   // $query = DB::table('products')->select('id')->where('price', '<', 830);
   // $this->product = DB::table('products')->whereIn('id', $query)->get();

   //$this->product = DB::table('products')->whereNotNull('updated_at')->get();

  // $this->product = DB::table('products')->orderBy('stock', 'desc')->get();

  //$this->product = DB::table('products')->latest()->get();

 // $this->product = DB::table('products')->skip(10)->take(5)->get();

 $currentDate = Carbon::now()->toDateString();

  $this->product = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
           ->select('categories.term', DB::raw('SUM(products.price) as total_amount'))
           ->groupBy('categories.term')
           ->get();

        $this->product1 = DB::table('products')
           ->join('product_sell', 'product_sell.product_id', '=', 'products.id')
           ->join('categories', 'categories.id', '=', 'products.category_id')
          ->select('categories.term', DB::raw('SUM(products.price) as total_amount'), DB::raw('SUM(products.price - products.cost) as total_profit'))
          ->whereDate('product_sell.created_at', $currentDate)
          ->groupBy('categories.term')
          ->get();

        $this->product2 = DB::table('products')
          ->join('product_sell', 'product_sell.product_id', '=', 'products.id')
          ->join('categories', 'categories.id', '=', 'products.category_id')
          ->select('products.id', DB::raw('SUM(products.price) as total_product_sell'), DB::raw('SUM(products.cost) as total_product_cost'), DB::raw('SUM(products.price - products.cost) as total_product_profit'), DB::raw('SUM(product_sell.qunatity) as total_product_quantity'), DB::raw('MAX(products.name) as product_name'), DB::raw('MAX(categories.term) as product_category'), DB::raw('MAX(products.image) as product_image'))
          ->whereDate('product_sell.created_at', $currentDate)
          ->groupBy('products.id')
          ->get();

        //   $this->product2 = DB::table('products')
        //    ->select('category_id', 'name', DB::raw('SUM(price) as total_amount'))
        //    ->groupBy('category_id', 'name')
        //    ->get();

        $this->sell = Sell::findOrFail(5)->get();
        return view('livewire.test-index');
    }

}
