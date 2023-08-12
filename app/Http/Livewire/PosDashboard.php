<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sell;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PosDashboard extends Component {

    public $search;
    public $cartproducts = [];
    public $mergedArray = [];

    public function render()
    {
        return view('livewire.pos-dashboard');
    }

    public function totalCount() {
        $totalPrice = array_reduce(session('my_array'), function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $totalQuantity = array_reduce(session('my_array'), function ($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);
        session()->put('totalPrice', $totalPrice);
        session()->put('totalQuantity', $totalQuantity);
    }

    public function updateQuantityPlus($code, $num) {
        $updateQty = [];
        foreach(session('my_array') as $val) {
            if($val['code'] == $code) {
                $updateQty[$val['code']] = $num + 1;
            } else {
                $updateQty[$val['code']] = $val['quantity'];
            }
        }
        $this->mergedArray = array_map(function ($value1, $value2) {
        return array_merge($value1, ['quantity' => $value2]);
        }, session('my_array'), $updateQty);
        session()->put('my_array', $this->mergedArray);
        $this->totalCount();
    }

    public function updateQuantityMinus($code, $num) {
        $updateQty = [];
        foreach(session('my_array') as $val) {
            if($val['code'] == $code) {
                $updateQty[$val['code']] = $num - 1;
            } else {
                $updateQty[$val['code']] = $val['quantity'];
            }
        }
        $this->mergedArray = array_map(function ($value1, $value2) {
        return array_merge($value1, ['quantity' => $value2]);
        }, session('my_array'), $updateQty);
        session()->put('my_array', $this->mergedArray);
        $this->totalCount();
    }

    public function resetsession() {
        $this->cartproducts = [];
        $this->mergedArray = [];
        session()->forget(['my_array', 'totalPrice', 'totalQuantity']);
    }

    public function submit() {
        $item = Product::select('id', 'code', 'name', 'price')->where('code', $this->search)->first();
        $this->cartproducts[$item->code] = [
            'id' => $item->id,
            'code' => $item->code,
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => 1
         ];
        session()->put('my_array', $this->cartproducts);
        $this->search = "";
        $this->totalCount();
    }

    public function submitSale() {

        $sell = Sell::create([
            'user_id' => Auth::user()->id,
            'customer_id' => 1,
            'total_amount' => session('totalPrice'),
            'payment_method' => 'cash'
        ]);

        if($sell) {
            $productQuery = session('my_array');
            foreach($productQuery as $proQuery) {
                $product = Product::findOrFail($proQuery['id']);
                $sell->product()->attach($product->id, [
                    'qunatity' => $proQuery['quantity'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            $this->cartproducts = [];
            $this->mergedArray = [];
            session()->forget(['my_array', 'totalPrice', 'totalQuantity']);
            flash()->addSuccess('Your sell is successfully completed');
        }
    }
}
