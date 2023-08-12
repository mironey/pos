<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model="search">
        <button type="submit">Save Contact</button>
    </form>
    <div class="cart-data-table">
        <table class="w-full text-sm text-left">
            <thead class="uppercase bg-slate-100">
                <tr>
                    <th class="px-6 py-3">
                        Code
                    </th>
                    <th class="px-6 py-3">
                        Product name
                    </th>
                    <th class="px-6 py-3">
                        Price
                    </th>
                    <th class="px-6 py-3">
                        Quantity
                    </th>
                    <th class="px-6 py-3">
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(session()->has('my_array'))
                    @foreach(session('my_array') as $cartproduct)
                    <tr class="border-b">
                        <td class="px-6 py-4 font-medium">
                            {{$cartproduct["code"]}}
                        </td>
                        <td class="px-6 py-4">
                            {{$cartproduct["name"]}}
                        </td>
                        <td class="px-6 py-4">
                            {{$cartproduct["price"]}}
                        </td>
                        <td class="px-6 py-4">
                            <span>{{$cartproduct['quantity']}}</span>
                            <button wire:click="updateQuantityPlus({{$cartproduct['code']}},{{$cartproduct['quantity']}})">+</button>
                            <button wire:click="updateQuantityMinus({{$cartproduct['code']}},{{$cartproduct['quantity']}})">-</button>
                        </td>
                        <td class="px-6 py-4">
                        {{($cartproduct["price"]) * ($cartproduct['quantity'])}}
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
        <div class="flex text-center font-medium bg-slate-100 p-5">
            @if(session()->has('my_array'))
            <div class="flex-1"><button class="pos-btn ml-5" wire:click="submitSale">Submit</button></div>
            <div class="flex-1">Total Quantity : {{session('totalQuantity')}} Pcs</div>
            <div class="flex-1">Total Price : ${{session('totalPrice')}}</div>
            <div class="flex-1"><button class="pos-btn mr-5" wire:click="resetsession">Reset</></div>
            @endif
        </div>
    </div>
</div>
