<style>
    @media screen and (max-width:576px) {
        .nav a {
            min-width: 30% !important;
            max-width: 50% !important;
            display: inline-block !important;
            font-size: 13px !important;
            white-space: nowrap !important;
            /* background-color: var(--lightColor) !; */
        }
    }
</style>


<div class="nav flex-md-column flex-row nav-pills justify-content-sm-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a href="{{ route('profile.index') }}" class=" text-light nav-link @isroute('profile.index') active @endisroute" id="v-pills-home-tab" data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true">
        <i class="fa fa-cog mr-2"></i>
        Settings
    </a>
    <a href="{{ route('profile.pgp') }}" class=" text-light nav-link @isroute('profile.pgp') active @endisroute" data-toggle="pill">
        <i class="fa fa-key mr-2"></i>
        PGP Key
    </a>
    @if(auth() -> user() -> isVendor())

    <a href="{{ route('profile.vendor') }}" class=" text-light nav-link @isroute('profile.vendor') active @endisroute" data-toggle="pill">
        <i class="far fa-address-card mr-2"></i>
        Vendor
    </a>
    <a href="{{ route('profile.sales') }}" class=" text-light nav-link @isroute('profile.sales') active @endisroute" data-toggle="pill">
        <i class="fas fa-receipt mr-2"></i>
        Sales
        @if(auth() -> user() -> vendor -> unreadSales() > 0)
        <span class="badge badge-warning">{{ auth() -> user() -> vendor -> unreadSales() }} new</span>
        @endif
    </a>
    @else
    <a href="{{ route('profile.become') }}" class=" text-light nav-link @isroute('profile.become') active @endisroute" data-toggle="pill">
        <i class="far fa-address-card mr-2"></i>
        Become Vendor
    </a>

    @endif

    <a href="{{ route('profile.wishlist') }}" class=" text-light nav-link @isroute('profile.wishlist') active @endisroute" data-toggle="pill">
        <i class="fas fa-heart mr-2"></i>
        Wishlist
    </a>

    <a href="{{ route('profile.purchases') }}" class=" text-light nav-link @isroute('profile.purchases') active @endisroute" data-toggle="pill">
        <i class="fas fa-shopping-cart mr-2"></i>
        Purchases
    </a>
    <a href="{{ route('profile.messages') }}" class=" text-light nav-link @isroute('profile.messages') active @endisroute" data-toggle="pill">
        <i class="mr-2 far fa-comments"></i>
        Messages
    </a>
    <a href="{{ route('profile.notifications') }}" class=" text-light nav-link @isroute('profile.notification') active @endisroute" data-toggle="pill">
        <i class="mr-2 far fa-bell"></i>
        Notifications
    </a>

    <!-- Add New : Genius Dev -->
    <a href="{{ route('profile.deposit') }}" class="text-light nav-link  @isroute('profile.deposit') active @endisroute" data-toggle="pill">
        <i class="mr-2 far far fa-money-bill-alt"></i>
        Deposit
    </a>
    <a href="{{ route('profile.exchange') }}" class="text-light nav-link  @isroute('profile.exchange') active @endisroute" data-toggle="pill">
        <i class="mr-2 fas fa-exchange-alt"></i>
        Exchange
    </a>
</div>