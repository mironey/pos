<div>
    <form wire:submit.prevent="SaveProduct">
        <div class="grid grid-rows-6 md:grid-cols-2 gap-4"> 
            <div>
                @include('components.form-field', [
                    'wirename' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                    'placeholder' => 'Product name',
                    'required' => 'required'
                ])
            </div>
            <div class="row-span-6">  
                <div class="flex flex-col justify-items-center">
                    @include('components.form-field', [
                        'wirename' => 'tempImage',
                        'label' => 'Upload image',
                        'type' => 'file',
                        'help' => 'JPEG, PNG or JPG (MAX. 2MB).',
                        'src' => $image,
                        'alt' => 'Product image'
                    ])
                </div>
            </div>
            <div>
                @include('components.form-field', [
                    'wirename' => 'code',
                    'label' => 'Product Code',
                    'type' => 'text',
                    'placeholder' => 'Product code',
                    'required' => 'required'
                ])
            </div>
            <div>
                @include('components.form-field', [
                    'wirename' => 'stock',
                    'label' => 'Quantity',
                    'type' => 'number',
                    'placeholder' => 'Product quantity',
                    'required' => 'required'
                ])
            </div>
            <div>
                @include('components.form-field', [
                    'wirename' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'placeholder' => 'Product cost',
                    'required' => 'required'
                ])
            </div>
            <div>
                @include('components.form-field', [
                    'wirename' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'placeholder' => 'Product price',
                    'required' => 'required'
                ])
            </div>
            <div>
                @include('components.form-field', [
                    'wirename' => 'selectedCategory',
                    'label' => 'Category',
                    'type' => 'select',
                    'required' => 'required',
                    'options' => $categoryList,
                ])
            </div>
        </div>
    
        @include('components.form-field', [
            'label' => 'Add Product',
            'type' => 'submit'
        ])

    </form>

</div>
