<div>
  <table class="w-full table-auto">
    <thead>
      <tr>
        <th class="border border-slate-200 px-4 py-2">Name</th>
        <th class="border border-slate-200 px-4 py-2">Cost</th>
        <th class="border border-slate-200 px-4 py-2">Price</th>
        <th class="border border-slate-200 px-4 py-2">Category</th>
        <th class="border border-slate-200 px-4 py-2">Image</th>
        <th class="border border-slate-200 px-4 py-2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td class="border border-slate-200 px-4 py-2">{{$product->name}}</td>
        <td class="border border-slate-200 px-4 py-2">{{$product->cost}}</td>
        <td class="border border-slate-200 px-4 py-2">{{$product->price}}</td>
        <td class="border border-slate-200 px-4 py-2">{{$product->category->name}}</td>
        <td class="border border-slate-200 px-4 py-2"><img class="w-auto h-12 mx-auto" src="{{$product->image}}" alt="{{$product->name}}" /></td>
        <td class="border border-slate-200 px-4 py-2">
          <div class="flex justify-center space-x-2">
            <a href="{{route('product.show', $product->id)}}">@include("components.icons.view")</a>
            <a href="{{route('product.edit', $product->id)}}">@include("components.icons.edit")</a>
            <form wire:submit.prevent="ProductDelete({{$product->id}})" class="flex" onsubmit="return confirm('Are you sure to delete ?')">
              <button type="submit">@include("components.icons.trash")</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="flex justify-end p-8">
  {{ $products->links() }}
  </div>
</div>