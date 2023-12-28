<div>
    <button class="fi-dropdown-list-item flex w-full items-center gap-2 whitespace-nowrap rounded-md p-2 text-sm transition-colors duration-75 outline-none disabled:pointer-events-none disabled:opacity-70 fi-color-custom fi-dropdown-list-item-color-warning hover:bg-custom-50 focus-visible:bg-custom-50 dark:hover:bg-custom-400/10 dark:focus-visible:bg-custom-400/10 fi-ac-grouped-action"
            type="button" wire:loading.class="text-gray-400" wire:loading.attr="disabled"
            wire:click="mountTableAction('edit_name', {{$recordKey}})">
        <div wire:target="mountTableAction('edit_name', {{$recordKey}})"
             class="font-bold">{{ $getRecord()->name }}</div>
    </button>
    <a class="fi-link group/link p-2 relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom"
       href="{{config('app.preview_url') . 'landing-page-name-column.blade.php/' . $getRecord()->salekit_page_id}}"
       target="_blank">
        <span class="text-sm" style="color: #03a9f4!important;">
        {{config('app.preview_url') . 'landing-page-name-column.blade.php/' . $getRecord()->salekit_page_id}}
        </span>
    </a>
</div>
