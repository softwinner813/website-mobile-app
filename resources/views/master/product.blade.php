@extends('master.main')

@section('title','Product - ' . $product -> name )

@section('content')

<style>
    @media screen and (max-width:767px) {
        .wrapSm {
            white-space: normal !important;
        }
    }
</style>
<nav class="main-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb bg-dark-l">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}" class=" text-light">Products</a>
        </li>
        @foreach($product -> category -> parents() as $ancestor)
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('category.show', $ancestor) }}" class=" text-light">{{ $ancestor -> name }}</a></li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.show', $product -> category) }}" class=" text-light">{{ $product -> category -> name }}</a>
        </li>
    </ol>
</nav>


<div class="row pt-4">
    {{-- Shop with confidence --}}
    <div class="col-lg-3">
        <div class="card mb-2">
            <div class="card-body">
                <h6>
                    <i class="fas fa-shield-alt"></i>
                    Shop with confidence
                </h6>
                <div class="text-black">
                    You are Escrow protected for each product in the market!
                </div>
            </div>
        </div>
        <style>
            @media screen and (max-width: 426px){
                td{
                    padding:10px 0 0 5px !important;
                }
            }
            @media screen and (max-width: 376px){
                .btn-own{
                    width: 80%;
                    display: block;
                    margin: 10px auto !important;
                }
            }
        </style>
        <div class="card">
            <div class="card-header">
                Seller information
            </div>
            <div class="card-body">
                @php
                $vendor = $product->user;
                @endphp
                <div class="row my-1 text-md-center">
                    <div class="col-4">
                        <span class="fas fa-plus-circle text-success"></span> {{$vendor->vendor->countFeedbackByType('positive')}}
                    </div>
                    <div class="col-4">
                        <span class="fas fa-stop-circle text-secondary"></span> {{$vendor->vendor->countFeedbackByType('neutral')}}

                    </div>
                    <div class="col-4">
                        <span class="fas fa-minus-circle text-danger"></span> {{$vendor->vendor->countFeedbackByType('negative')}}
                    </div>
                </div>
                <hr>
                <a href="{{ route('profile.messages').'?otherParty='.$product -> user ->username}}" class="btn mb-1 btn-block btn-secondary"><span class="fas fa-envelope"></span> Send message</a>
                <a href="{{route('search',['user'=>$product->user->username])}}" class="btn mb-1 btn-info btn-block">Seller's products ({{$product -> user ->products()->count()}})</a>

            </div>
        </div>
    </div>
    <div class="col-lg-3  pt-4 pt-lg-0 mx-auto">
        <div class="slider  p-3">
            <div class="slides">
                <img src="https://picsum.photos/200/200" class="w-100 h-auto" alt="">
                @php $i = 1; @endphp
                @foreach($product -> images() -> orderBy('first', 'desc') -> get() as $image)
                <div id="slide-{{ $i++ }}">
                    <img class="w-100 h-auto" src="{{ asset('storage/' . $image -> image) }}">
                </div>
                @endforeach
            </div>

            @php $i = 1; @endphp
            @foreach($product -> images as $image)
            <a href="#slide-{{ $i }}">{{ $i++ }}</a>
            @endforeach
        </div>
    </div>

    <div class="col-lg-6 pt-3">
        <div class="">
            @include('includes.flash.error')

            <h3 class="font-weight-bold">{{ $product -> name }}</h3>
            <p class="mt-2">{{$product->description}}</p>
            <p class="mb-1">Sold By <a href="{{ route('vendor.show', $product -> user) }}" class="text-warning">{{ $product -> user -> username }}</a></p>
            <span class="btn btn-warning btn-sm">Level {{$product->user->vendor->getLevel()}} </span>

            <div class="row">
                <div class="col-md-12 text-center">

                    <form action="{{ route('profile.cart.add', $product) }}" method="POST">
                        {{ csrf_field() }}

                        <table class="table border-0 text-left table-borderless">
                            <tbody style="white-space: nowrap;" class="wrapSm">

                                <tr>
                                    <td class="text-white-50">Quality rate:</td>
                                    <td class="text-light">
                                        @include('includes.purchases.stars', ['stars' => (int)$product->avgRate('quality_rate')])
                                    </td>
                                    <td class="text-white-50">
                                        Type
                                    </td>
                                    <td>
                                        <strong class="badge badge-info">{{ ucfirst($product -> type) }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white-50">
                                        <label for="type">Purchase type:</label>
                                    </td>
                                    <td>
                                        @if(count($product -> getTypes()) > 1)
                                        <select name="type" id="type" class="form-control form-control-sm">
                                            @foreach($product -> getTypes() as $type)
                                            <option value="{{ $type }}">{{ \App\Purchase::$types[$type] }}</option>
                                            @endforeach
                                        </select>
                                        @elseif(count($product -> getTypes()) == 1)
                                        <span class="badge badge-mblue">{{ \App\Purchase::$types[$product -> getTypes()[0]] }}</span>
                                        <input type="hidden" name="type" value="{{ $product -> getTypes()[0] }}">
                                        @endif
                                    </td>


                                    <td class=" text-white-50">
                                        Offers
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach($product -> offers as $offer)
                                            <li>
                                                <strong>@include('includes.currency', ['usdValue' => $offer -> dollars])</strong> per {{ str_plural($product -> mesure, 1) }},
                                                for at least {{ $offer -> min_quantity }} {{ str_plural('product', $offer -> min_quantity) }}
                                            </li>
                                            @endforeach
                                        </ul>

                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-white-50">
                                        Coins
                                    </td>
                                    <td>
                                        @foreach($product -> getCoins() as $coin)
                                        <span class="badge badge-indigo">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</span>
                                        @endforeach
                                    </td>

                                    <td class=" text-white-50">Left/Sold</td>
                                    <td>
                                        <span class="badge badge-light">{{ $product -> quantity }} {{ str_plural($product -> mesure, $product -> quantity) }}</span>/
                                        <span class="badge badge-light">{{ $product -> orders }} {{ str_plural($product -> mesure, $product -> orders) }} </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        @if($product->user->vendor->experience < 0) <p class="text-danger border border-danger rounded p-1 mt-2"><span class="fas fa-exclamation-circle"></span> Negative experience, trade with caution !
                                            </p>
                                            @endif
                                    </td>
                                </tr>
                                <tr>
                                    @if($product -> isPhysical())
                                    <td class="text-muted text-right">
                                        <label for="delivery">Delivery method:</label>
                                    </td>
                                    <td>
                                        <select name="delivery" id="delivery" class="form-control form-control-sm @if($errors -> has('delivery')) is-invalid @endif">
                                            @foreach($product -> specificProduct() -> shippings as $shipping)
                                            <option value="{{ $shipping -> id }}">{{ $shipping -> long_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    @endif
                                </tr>

                                <tr class="">
                                    <td class=" text-light">
                                        <label for="coin">Pay with Coin:</label>
                                    </td>
                                    <td colspan="3">
                                        @if(count($product -> getCoins()) > 1)
                                        <select name="coin" id="coin" class="form-control form-control-sm">
                                            @foreach($product -> getCoins() as $coin)
                                            <option value="{{ $coin }}">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</option>
                                            @endforeach
                                        </select>
                                        @elseif(count($product -> getCoins()) == 1)
                                        <span class="badge badge-mblue">{{ strtoupper(\App\Purchase::coinDisplayName($product -> getCoins()[0])) }}</span>
                                        <input type="hidden" name="coin" value="{{ $product -> getCoins()[0] }}">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-2">
                                <label for="amount">Amount:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" min="1" name="amount" id="amount" value="1" max="{{ $product -> quantity }}" class="@if($errors -> has('amount')) is-invalid @endif form-control form-control-sm" placeholder="Amount of {{ str_plural($product -> mesure) }}" />
                            </div>
                            <!-- </div> -->
                            <div class="col-lg-12  my-3 " style="white-space: nowrap;">
                                <button class="btn btn-sm btn-warning "><i class="fas fa-shopping-cart"></i> Buy Now</button>
                                <button class="btn btn-sm btn-primary "><i class="fas fa-plus mr-2"></i>Add to
                                    cart
                                </button>
                                @auth
                                @if(auth() -> user() -> isWhishing($product))
                                <a href="{{ route('profile.wishlist.add', $product) }}" class="btn btn-secondary  btn-sm"><i class="far fa-heart"></i> Remove
                                    from
                                    wishlist</a>
                                @else
                                <a href="{{ route('profile.wishlist.add', $product) }}" class="btn btn-sm btn-danger btn-own"><i class="fas fa-heart"></i> Add to wishlist</a>
                                @endif
                                @endauth
                            </div>
                        </div>



                    </form>
                    @include('includes.flash.invalid')

                </div>


            </div>
        </div>
    </div>

</div>
{{-- Product menu --}}
<ul id="productsmenu" class="my-4 nav nav-tabs nav-fill d-block d-md-flex">
    <li class="nav-item">
        <a class="nav-link @isroute('product.show') active @endisroute w-100" href="{{ route('product.show', $product) }}#productsmenu">Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @isroute('product.rules') active @endisroute" href="{{ route('product.rules', $product) }}#productsmenu">Payment rules</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @isroute('product.feedback') active @endisroute" href="{{ route('product.feedback', $product) }}#productsmenu">Feedback</a>
    </li>
    @if($product -> isPhysical())
    <li class="nav-item">
        <a class="nav-link @isroute('product.delivery') active @endisroute" href="{{ route('product.delivery', $product) }}#productsmenu">Delivery</a>
    </li>
    @endif


</ul>

@yield('product-content')
@stop