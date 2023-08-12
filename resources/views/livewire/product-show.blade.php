<div>
    <div class="flex flex-row justify-center items-center">
        <div class="basis-2/5 p-6">
            <img class="mx-auto rounded-md max-w-full h-auto" src="{{asset($this->productArr->image)}}" alt="{{$this->productArr->name}}">
        </div>
        <div class="basis-3/5">
            <h2 class="font-semibold text-2xl leading-loose">{{$this->productArr->name}}</h2>
            <h3 class="font-medium leading-relaxed bg-cyan-600 text-white inline-block px-3 py-1 rounded-sm">Cost: ${{$this->productArr->cost}} | Price: ${{$this->productArr->price}}</h3>
            <p class="leading-relaxed pt-5">The Zip Tote Basket is the perfect midpoint between shopping tote and comfy backpack. With convertible straps, you can hand carry, should sling.</p>
            <ul class="list-disc list-inside pl-5 pt-5 leading-relaxed">
                <li>Product Code: {{$this->productArr->code}}</li>
                <li>Quantity: {{$this->productArr->stock}} Pcs</li>
                <li>Category: {{$this->productArr->category->name}}</li>
            </ul>
        </div>
    </div>
</div>