<!--begin::Header Logo-->
{{-- <div class="header-logo">
    <a href="index.html">
        <img alt="Logo" src="assets/media/logos/logo-dark.png" />
    </a>
</div> --}}
<!--end::Header Logo-->
<!--begin::Header Menu-->
<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
    <!--begin::Header Nav-->
    <ul class="menu-nav">
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'menu-item-active' : '' }}" >
            <a href="{{ route('dashboard') }}" class="menu-link">
                <span class="menu-text">Dashboard</span>
                <i class="menu-arrow"></i>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('expenses.index') ? 'menu-item-active' : '' }}">
            <a href="{{ route('expenses.index') }}" class="menu-link">
                <span class="menu-text">Expenses</span>
            </a>
        </li>
    </ul>
    <!--end::Header Nav-->
</div>
<!--end::Header Menu-->