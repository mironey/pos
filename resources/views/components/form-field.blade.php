@if($type == "textarea")
    <textarea wire:model.defer="{{$wirename}}" id="{{$wirename}}" placeholder="{{$placeholder}}" value="test" class="pos-input" {{$required}}></textarea>
    @error($wirename)
        <div class="text-red-500 text-sm mt-2">{{$message}}</div>
    @enderror

@elseif($type == "select")
    <label for="{{$wirename}}" class="pos-label">{{$label}}</label>
    <select class="pos-input" wire:model.defer="{{$wirename}}" id="{{$wirename}}" {{$required}}>
        <option>Select {{$label}}</option>
        @foreach($options as $option)
            <option value="{{$option->id}}">{{ucfirst($option->name)}}</option>
        @endforeach
    </select>
    @error($wirename)
        <div class="text-red-500 text-sm mt-2">{{$message}}</div>
    @enderror

@elseif($type == "file")
    <div class="image-upload-field">
        <label class="pos-label" for="image-input">{{$label}}</label>
        <input class="post-file-input" wire:model.defer="{{$wirename}}" aria-describedby="image-input-help" id="image-input" type="file">
        <p class="image-input-help" id="image-input-help">{{$help}}</p>
    </div>
    @error($wirename)
        <div class="text-red-500 text-sm mt-2">{{$message}}</div>
    @enderror


    @if(isset($tempImage))
        <div class="image-display-field">
            <img class="object-cover max-w-full max-h-full" src="{{$tempImage->temporaryUrl()}}" alt="{{$alt}}" />
        </div>
    @elseif(isset($image))
        <div class="image-display-field">
            <img class="object-cover max-w-full max-h-full" src="{{asset($image)}}" alt="{{$alt}}" />
        </div>
    @else 
        <div class="image-display-field">
            <p class="text-center">No Image available !</p>
        </div>
    @endif

@elseif($type == "submit")
    <div class="mt-5">
        <div wire:loading.flex class="items-center">
            <svg class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            <span class="pl-2">Loading...</span>
        </div> 
        <button wire:loading.remove type="submit" class="pos-btn">{{$label}}</button>
    </div>

@else
    <label for="{{$wirename}}" class="pos-label">{{$label}}</label>
    <input type="{{$type}}" wire:model.defer="{{$wirename}}" id="{{$wirename}}" class="pos-input" placeholder="{{$placeholder}}" {{$required}}>
    @error($wirename)
        <div class="text-red-500 text-sm mt-2">{{$message}}</div>
    @enderror

@endif