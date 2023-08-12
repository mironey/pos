<div>
    <h2>Today Sale</h2>
    <div class="flex text-center space-x-5">
        <div class="flex-1 bg-slate-100">
            <div class="card-header border-slate-200 border-b p-3">
                <h3 class="font-semibold text-lg">Sale</h3>
            </div>
            <div class="card-body">
                <div class="flex justify-center items-center h-36 min-h-full p-4">
                    <h2 class="font-medium text-3xl">USD {{$totalSale}}</h2>
                </div>
            </div>
            <div class="card-footer border-slate-200 border-t p-3">
                <p><a href="">View Details</a></p>
            </div>
        </div>
        <div class="flex-1 bg-slate-100">
            <div class="card-header border-slate-200 border-b p-3">
                <h3 class="font-semibold text-lg">Profit</h3>
            </div>
            <div class="card-body">
                <div class="flex justify-center items-center h-36 min-h-full p-4">
                    <h2 class="font-medium text-3xl">USD {{$totalProfit}}</h2>
                </div>
            </div>
            <div class="card-footer border-slate-200 border-t p-3">
                <p><a href="">View Details</a></p>
            </div>
        </div>
        <div class="flex-1 bg-slate-100">
            <div class="card-header border-slate-200 border-b p-3">
                <h3 class="font-semibold text-lg">Quantity</h3>
            </div>
            <div class="card-body">
                <div class="flex justify-center items-center h-36 min-h-full p-4">
                    <h2 class="font-medium text-3xl">{{$totalQuantity}} Pcs</h2>
                </div>
            </div>
            <div class="card-footer border-slate-200 border-t p-3">
                <p><a href="">View Details</a></p>
            </div>
        </div>
    </div>
    <div class="flex mt-5 mb-5">
        <table class="w-full table-auto">
            <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2">Code</th>
                <th class="border border-slate-200 px-4 py-2">Product</th>
                <th class="border border-slate-200 px-4 py-2">Quantity</th>
                <th class="border border-slate-200 px-4 py-2">Price</th>
                <th class="border border-slate-200 px-4 py-2">Cost</th>
                <th class="border border-slate-200 px-4 py-2">Profit</th>
                <th class="border border-slate-200 px-4 py-2">Category</th>
                <th class="border border-slate-200 px-4 py-2">Image</th>
            </tr>
            </thead>
            <tbody>
                @foreach($totalProductSale as $productSale)
                <tr>
                    <td class="border border-slate-200 px-4 py-2">{{$productSale->product_code}}</td>
                    <td class="border border-slate-200 px-4 py-2">{{$productSale->product_name}}</td>
                    <td class="border border-slate-200 px-4 py-2">{{$productSale->total_product_quantity}} Pcs</td>
                    <td class="border border-slate-200 px-4 py-2">${{$productSale->total_product_sell}}</td>
                    <td class="border border-slate-200 px-4 py-2">${{$productSale->total_product_cost}}</td>
                    <td class="border border-slate-200 px-4 py-2">${{$productSale->total_product_profit}}</td>
                    <td class="border border-slate-200 px-4 py-2">{{$productSale->product_category}}</td>
                    <td class="border border-slate-200 px-4 py-2">{{$productSale->product_image}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex flex-row space-x-5">
        <div class="flex-1">
            <table class="w-full table-auto">
                <thead>
                <tr>
                    <th class="border border-slate-200 px-4 py-2">Category</th>
                    <th class="border border-slate-200 px-4 py-2">Sell</th>
                    <th class="border border-slate-200 px-4 py-2">Profit</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($totalCatSale as $catSale)
                    <tr>
                        <td class="border border-slate-200 px-4 py-2">{{$catSale->term}}</td>
                        <td class="border border-slate-200 px-4 py-2">${{$catSale->total_amount}}</td>
                        <td class="border border-slate-200 px-4 py-2">${{$catSale->total_profit}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex-1">
            <table class="w-full table-auto">
                <thead>
                <tr>
                    <th class="border border-slate-200 px-4 py-2">Customer</th>
                    <th class="border border-slate-200 px-4 py-2">Phone</th>
                    <th class="border border-slate-200 px-4 py-2">Amount</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($allSellByCustomer as $sellByCustomer)
                    <tr>
                        <td class="border border-slate-200 px-4 py-2">{{$sellByCustomer->customer_name}}</td>
                        <td class="border border-slate-200 px-4 py-2">{{$sellByCustomer->customer_phone}}</td>
                        <td class="border border-slate-200 px-4 py-2">${{$sellByCustomer->total_customer_amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex mt-5 mb-5">
        <div class="flex-1">
            <table class="w-full table-auto">
                <thead>
                <tr>
                    <th class="border border-slate-200 px-4 py-2">Voucher Id</th>
                    <th class="border border-slate-200 px-4 py-2">User</th>
                    <th class="border border-slate-200 px-4 py-2">Customer</th>
                    <th class="border border-slate-200 px-4 py-2">Payment Method</th>
                    <th class="border border-slate-200 px-4 py-2">Total Amount</th>
                    <th class="border border-slate-200 px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($allSellVoucher as $sellVoucher)
                    <tr>
                        <td class="border border-slate-200 px-4 py-2">{{$sellVoucher->id}}</td>
                        <td class="border border-slate-200 px-4 py-2">{{$sellVoucher->user->name}}</td>
                        <td class="border border-slate-200 px-4 py-2">{{$sellVoucher->customer->name}}</td>
                        <td class="border border-slate-200 px-4 py-2">${{$sellVoucher->payment_method}}</td>
                        <td class="border border-slate-200 px-4 py-2">${{$sellVoucher->total_amount}}</td>
                        <td class="border border-slate-200 px-4 py-2">
                            <p>View Invoice</p>
                            @foreach($sellVoucher->product as $sellProduct)
                            <p>Name: {{$sellProduct->name}}</p>
                            <p>Price: {{$sellProduct->price}}</p>
                            <p>Quantity: {{$sellProduct->pivot->qunatity}}</p>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
