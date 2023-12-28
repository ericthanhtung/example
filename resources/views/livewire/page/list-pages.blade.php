<div class="my-2">
    <div class="text-right mb-2">
        <x-filament::modal>
            <x-slot name="trigger">
                <x-filament::button color="success">
                    {{__('Tạo mới')}}
                </x-filament::button>
            </x-slot>

            <x-slot name="heading">
                <div>{{__('Tạo Landing page mới')}}</div>
            </x-slot>

            <div class="w-full rounded-lg mx-auto">
                <form wire:submit="create" class="w-full">
                    {{ $this->form }}
                    <div class="text-center my-4">
                        <x-filament::button type="submit" color="success">
                            {{__('Tạo mới')}}
                        </x-filament::button>
                    </div>
                </form>
            </div>
        </x-filament::modal>
    </div>
    {{ $this->table }}
    <x-filament-actions::modals />
</div>
