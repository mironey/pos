<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <p class="text-white text-sm font-semibold p-3">Menu</p>
    <div class="flex flex-col sidebar-nav-menu">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
            {{ __('Product') }}
        </x-nav-link>
        <x-nav-link :href="route('sell.index')" :active="request()->routeIs('sell.index')">
            {{ __('Sale Report') }}
        </x-nav-link>
    </div>
</nav>
