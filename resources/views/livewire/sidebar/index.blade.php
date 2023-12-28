<div>
    <div
        x-cloak
        x-data="{}"
        x-on:click="$store.sidebar.close()"
        x-show="$store.sidebar.isOpen"
        x-transition.opacity.300ms
        class="fi-sidebar-close-overlay fixed inset-0 z-30 bg-gray-950/50 transition duration-500 dark:bg-gray-950/75 lg:hidden"
    ></div>
    <aside x-data="{}" x-bind:class="
                $store.sidebar.isOpen
                    ? 'fi-sidebar-open w-[--sidebar-width] translate-x-0 shadow-xl ring-1 ring-gray-950\/5 rtl:-translate-x-0 dark:ring-white\/10 lg:sticky'                    : 'w-[--sidebar-width] -translate-x-full rtl:translate-x-full lg:sticky'
            " class="fi-sidebar fixed inset-y-0 start-0 z-30 grid h-screen content-start bg-white transition-all dark:bg-gray-900 lg:z-0 lg:bg-transparent lg:shadow-none lg:ring-0 lg:transition-none dark:lg:bg-transparent lg:translate-x-0 rtl:lg:-translate-x-0 w-[--sidebar-width] -translate-x-full rtl:translate-x-full lg:sticky">
        <div class="overflow-x-clip">
            <header class="fi-sidebar-header flex h-16 items-center bg-white px-6 ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 lg:shadow-sm">
                <x-ui.logo/>
            </header>
        </div>
        <nav class="fi-sidebar-nav flex flex-col gap-y-7 overflow-y-auto overflow-x-hidden px-6 py-8" style="scrollbar-gutter: stable">
            <ul class="-mx-2 flex flex-col gap-y-2">
                <li>
                    <x-filament::link :color="request()->routeIs('page') ? 'warning' : 'gray'" class="p-2" icon="heroicon-m-wallet" x-on:click="$store.sidebar.close()" :href="route('page')">
                        Landing Page
                    </x-filament::link>
                </li>
            </ul>
        </nav>
    </aside>
</div>
