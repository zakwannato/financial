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

        <li class="menu-item {{ request()->routeIs('commitments.index') ? 'menu-item-active' : '' }}">
            <a href="{{ route('commitments.index') }}" class="menu-link">
                <span class="menu-text">Commitment</span>
            </a>
        </li>

        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
            <a href="" class="menu-link menu-toggle">
                <span class="menu-text">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                <ul class="menu-subnav">
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('m_commitment.index') }}" class="menu-link">
                            <span class="menu-text">Master Commitment</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('m_payment.index') }}" class="menu-link">
                            <span class="menu-text">Master Payment Method</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('credit_cards.index') }}" class="menu-link">
                            <span class="menu-text">Credit Card</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>

    </ul>
    <!--end::Header Nav-->
</div>
<!--end::Header Menu-->