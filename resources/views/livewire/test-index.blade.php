<div>
<pre>
  {{print_r($sell)}}
</pre>
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
      <tr>
        <td class="border border-slate-200 px-4 py-2">Test</td>
        <td class="border border-slate-200 px-4 py-2">Test</td>
        <td class="border border-slate-200 px-4 py-2">Test</td>
        <td class="border border-slate-200 px-4 py-2">Test</td>
        <td class="border border-slate-200 px-4 py-2"><img class="w-auto h-12 mx-auto" src="" alt="" /></td>
        <td class="border border-slate-200 px-4 py-2">
          <div class="flex justify-center space-x-2">
            <a href="">@include("components.icons.view")</a>
            <a href="">@include("components.icons.edit")</a>
            <form wire:submit.prevent="" class="flex" onsubmit="return confirm('Are you sure to delete ?')">
              <button type="submit">@include("components.icons.trash")</button>
            </form>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>