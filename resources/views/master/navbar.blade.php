<header>
    <div class=" text-light" style="background-color: #222739;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 text-center text-md-left ">
                    <span class="">CURRENCY : </span>
                    <span class="font-weight-bolder">USD ( <i class="fas fa-arrow-circle-up text-success"></i> 47300.05)</span>
                </div>
                <div class="col-lg-6 col-md-7 text-center text-md-right">
                    <span class="">
                        <div class="btn-group">
                            <a href="#" class="mr-3 d-none d-sm-inline text-light">SHOP</a>
                            <a href="{{ route('profile.messages') }}" class="mr-3 mx-sm-3 text-light">MESSAGES</a>
                            @auth
                            <a href="{{ route('profile.index') }}" class="@isroute('profile.index') active @endisroute text-uppercase  font-weight-bold  text-light">{{auth()->user()->username}}</a>

                            <div class="">
                                <form class="form-inline mx-3  text-light" action="{{route('auth.signout.post')}}" method="post">
                                    {{csrf_field()}}
                                    <button class="border-0 bg-transparent  text-light" type="submit" style="text-decoration: none;">Sign Out</button>
                                </form>
                            </div>
                        </div>
                    </span>
                    @else
                    <a class="mx-3  text-light" href="{{route('auth.signin')}}">Sign In</a>
                    <a class="mx-3  text-light" href="{{route('auth.signup')}}">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <style>
        @media screen and (max-width : 426px) {
            .cart-sm {
                position: absolute;
                top: 65px;
                right: 22px;
            }
        }
    </style>
    <nav class="bg-dark position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-3 pt-2 text-center">
                    <a class="navbar-brand" href="{{ route("home") }}">
                        <h3 class="text-light">{{ config('app.name') }}</h3>
                    </a>
                </div>
                <div class="col-md-7  col-10  p-0">
                    @include('master.search')
                </div>
                <div class="col-2 p-0 pb-md-5  pt-1 text-center cart-sm">

                    <a class="nav-link  text-light position-relative d-block mx-auto" style="font-size: 30px; width:70px;" href="{{ route('profile.cart') }}">
                        <i class="fas fa-shopping-cart text-info"></i>
                        <span class="position-absolute badge badge-warning" style="font-size: 14px; right: 10px; top:5px">{{ session('cart_items') !== null ? count(session('cart_items')) : 0 }}</span>
                    </a>

                </div>
                <div class="d-none d-md-flex position-absolute font-weight-bold" style="right: 0px; bottom: 0%; background-color: #222739;">
                    <div class="px-2 bg-lg ">
                        <span class="text-danger">BTC: </span>
                        <a href="#" class="text-info font-weight-bold">{{auth()->user()->btc_balance}}</a>
                    </div>
                    <div class="px-2 bg-lg ">
                        <span class="text-danger">XMR: </span>
                        <a href="#" class="text-info font-weight-bold">{{auth()->user()->xmr_balance}}</a>
                    </div>
                    <div class="px-2 bg-lg ">
                        <span class="text-danger">USD: </span>
                        <a href="#" class="text-info font-weight-bold">{{auth()->user()->usd_balance}}</a>
                    </div>
                    <div class="px-2 bg-lg ">
                        <span class="text-danger">BTC: </span>
                        <a href="#" class="text-info font-weight-bold">0.000</a>
                    </div>
                    <div class="px-2 bg-lg ">
                        <span class="text-danger">BTC: </span>
                        <a href="#" class="text-info font-weight-bold">0.000</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </nav>
    <div class="navTwo  py-3 d-none d-md-block" style="background-color: #222739;">
        <div class="container text-right">
            <ul class="list-unstyled mb-0 pb-0 d-flex d-md-inline-block">
                <li class="text-light  mx-3 d-none d-sm-inline-block">
                    <span class="">
                        <a href="{{ route('profile.index') }}" class="text-light"><i class="fas fa-cogs"></i> Setting</a>
                    </span>
                </li>
                <li class="text-light  mx-3 d-none d-sm-inline-block">
                    <span class="">
                        <a href="{{ route('profile.messages') }}" class="text-light"><i class="fas fa-comments"></i> MESSAGES</a>
                    </span>
                </li>
                <li class="text-light d-inline-block mx-3">
                    @admin
                    <span class=" @isroute('admin') active @endisroute">
                        <a class="text-light mx-3" href="{{ route('admin.index') }}"><i class="fas fa-user-shield"></i> Admin panel</a>
                    </span>
                    @endadmin
                    @moderator
                    <span class=" @isroute('admin') active @endisroute">
                        <a class="text-light mx-3" href="{{ route('admin.index') }}"><i class="fas fa-users-cog"></i> Moderator panel</a>
                    </span>
                    @endmoderator
                    @auth
                    <span class=" @isroute('profile.tickets') active @endisroute">
                        <a class="text-light mx-3" href="{{ route('profile.tickets') }}"><i class="fas fa-compact-disc"></i> Support</a>
                    </span>
                    @endauth
                </li>
                <li class="text-light d-inline-block mx-3">
                    @auth
                    <a href="{{route('profile.notifications')}}" class="">
                        <span class="position-relative text-light">
                            <i class="fa fa-bell"></i> Notifications
                            <span class="position-absolute badge badge-dark" style="font-size: 13px; right: -20px; top:-10px">
                                {{auth()->user()->unreadNotifications()->count()}}
                            </span>
                        </span>
                    </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</header>


<!-- <nav class="navbar navbar-expand-lg  navbar-dark bg-mgray">
    <div class="container">
        <a class="navbar-brand" href="{{ route("home") }}">{{ config('app.name') }}</a>

        <input type="checkbox" id="navbar-toggle-cbox">


        <label class="navbar-toggler" for="navbar-toggle-cbox" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </label>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                @admin
                <li class="nav-item @isroute('admin') active @endisroute">
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin panel</a>
                </li>
                @endadmin
                @moderator
                <li class="nav-item @isroute('admin') active @endisroute">
                    <a class="nav-link" href="{{ route('admin.index') }}">Moderator panel</a>
                </li>
                @endmoderator
                @auth
                <li class="nav-item @isroute('profile.tickets') active @endisroute">
                    <a class="nav-link" href="{{ route('profile.tickets') }}">Support</a>
                </li>
                @endauth

            </ul>

            <ul class="navbar-nav">
                @auth

                <li class="nav-item @isroute('profile.notifications') active @endisroute">
                    <a href="{{route('profile.notifications')}}" class="nav-link">
                        <span @if(auth()->user()->unreadNotifications()->count() > 0) class="text-warning" @endif><i class="fa fa-bell"></i> {{auth()->user()->unreadNotifications()->count()}}</span>
                    </a>
                </li>
                <li class="nav-item text-center @isroute('profile.cart') active @endisroute">
                    <a class="nav-link w-100 text-black-50 {{ \App\Marketplace\Cart::getCart() ->numberOfItems() == 0 ? 'bg-secondary' : 'bg-warning' }}" href="{{ route('profile.cart') }}">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        ({{ session('cart_items') !== null ? count(session('cart_items')) : 0 }})
                    </a>
                </li>

                <li class="nav-item @isroute('profile.index') active @endisroute">
                    <a class="nav-link" href="{{ route('profile.index') }}">{{auth()->user()->username}}</a>
                </li>

                <form class="form-inline" action="{{route('auth.signout.post')}}" method="post">
                    {{csrf_field()}}
                    <button class="btn btn-link text-muted my-0" type="submit" style="text-decoration: none;">Sign Out</button>
                </form>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('auth.signin')}}">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('auth.signup')}}">Sign Up</a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav> -->