<div class="fi-topbar sticky top-0 z-20 overflow-x-clip">
    <nav class="flex h-16 items-center gap-x-4 bg-white px-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 md:px-6 lg:px-8">
        <x-filament::icon-button
            color="gray"
            icon="heroicon-o-bars-3"
            icon-alias="panels::topbar.open-sidebar-button"
            icon-size="lg"
            :label="__('filament-panels::layout.actions.sidebar.expand.label')"
            x-data="{}"
            x-on:click="$store.sidebar.open()"
            x-show="! $store.sidebar.isOpen"
            @class([
                'lg:hidden',
            ])
        />
    </nav>
</div>
