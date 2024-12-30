<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
    <div class="app-brand demo d-flex align-items-center justify-content-start">
        {{-- <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" width="120" height="auto"> --}}
        <h2 class="fw-bold">LOGO</h2>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps ps--active-y">

        <x-dashboard.sidebar.link title="لوحة التحكم" icon="home-circle" :link="route('dashboard')" :active="request()->routeIs('dashboard')" />
        <x-dashboard.sidebar.link title="طلبات خارج العراق" icon="package" :link="route('send-money-out.index')" :active="request()->routeIs('send-money-out.*')" />
        <x-dashboard.sidebar.link title="طلبات داخل العراق" icon="package" :link="route('send-money-to-iraq.index')" :active="request()->routeIs('send-money-to-iraq.*')" />
        <x-dashboard.sidebar.link title="طلبات تحويل الدولار" icon="dollar" :link="route('reserve-dollar-request.index')" :active="request()->routeIs('reserve-dollar-request.*')" />
        <x-dashboard.sidebar.link title="الطلبات المعدلة" icon="package" :link="route('modify-transfer-request.index')" :active="request()->routeIs('modify-transfer-request.*')" />

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 686px; right: 4px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 528px;"></div>
        </div>
    </ul>
</aside>
