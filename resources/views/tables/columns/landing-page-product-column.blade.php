<div>
    <button class="fi-dropdown-list-item whitespace-nowrap rounded-md p-2 text-sm transition-colors duration-75 outline-none disabled:pointer-events-none disabled:opacity-70 fi-color-custom fi-dropdown-list-item-color-warning hover:bg-custom-50 focus-visible:bg-custom-50 dark:hover:bg-custom-400/10 dark:focus-visible:bg-custom-400/10 fi-ac-grouped-action" type="button" wire:loading.class="text-gray-400" wire:loading.attr="disabled" wire:click="mountTableAction('update_product', {{$recordKey}})">
        <div wire:target="mountTableAction('update_product', {{$recordKey}})" class="font-bold">
            @if(!empty($getState()))
                <p class="truncate w-40 text-left">
                    {{$getState()}}
                </p>
            @else
                <div class="text-green-500 flex">
                    <x-filament::icon class="w-5 h-5" icon="heroicon-m-plus" label="{{__('Thêm mới')}}"/>
                    <span>Sản phẩm</span>
                </div>
            @endif
        </div>
    </button>
</div>
