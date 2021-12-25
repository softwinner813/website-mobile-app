@extends('master.main')

@section('title','Home Page')

@section('content')

<div class="row">
    <style>
        @media screen and (max-width : 900px) {
            .bg-none-md {
                background-color: transparent !important;
            }
        }
    </style>
    <div class="col-lg-3 col-md-4 col-sm-12">
        @auth
        <div class=" mb-2">
            <div class="bg-dark text-center py-2 text-light">
                Public Profile
            </div>
            <div class="bg-dark-l p-2">
                <div class="py-3">
                    <table class="w-100">
                        <tr>
                            <td class="text-light ">Name:</td>
                            <td class="text-right ">Basheer Ahmad</td>
                        </tr>
                        <tr>
                            <td class="text-light ">Joining:</td>
                            <td class="text-right ">00/00/00000</td>
                        </tr>
                        <tr>
                            <td class="text-light ">Total Orders:</td>
                            <td class="text-right ">00/00/00000</td>
                        </tr>
                        <tr>
                            <td class="text-light ">Trust Level:</td>
                            <td class="text-right"><button class="btn btn-sm btn-success">Level 1</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endauth
        @include('includes.categories')
        <div class="row mt-3">
            <div class="col">
                <div class="card overflow-auto">
                    <div class="text-uppercase  bg-dark py-2 text-center text-light">
                        <h6 class="text-uppercase mb-0">Official Mirrors</h6>
                    </div>
                    <div class="text-left">
                        @foreach(config('marketplace.mirrors') as $mirror)
                        <a href="{{$mirror}}" class=" text-info bt-bot-l py-2 d-block border-secondary pl-2 text-light" style="text-decoration:none;">{{$mirror}}</a>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-12  bg-dark-l m-3  m-md-0 rounded px-0">

        <div class="row">
            <div class="col">
                <h1 class="bg-dark text-center bg-none-md py-2">Welcome to {{config('app.name')}}</h1>
                <hr>
            </div>
        </div>
        <div class="px-3">

            <div class="row">
                <div class="col">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid cupiditate dolore enim et
                    eveniet fugiat illum ipsum itaque minus molestias nihil optio porro quisquam quo saepe sunt velit
                    veritatis.
                </div>
            </div>
            <div class="row mt-5">

                <div class="col-md-4">
                    <h4><i class="fa fa-money-bill-wave-alt text-info"></i> No deposit</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid dolorem hic nisi
                        ratione repellendus suscipit totam vitae!
                    </p>
                </div>

                <div class="col-md-4">
                    <h4><i class="fa fa-shield-alt text-info"></i> Escrow</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid dolorem hic nisi
                        ratione repellendus suscipit totam vitae!
                    </p>
                </div>

                <div class="col-md-4">
                    <h4><i class="fa fa-coins text-info"></i> Multiple-Coins</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid dolorem hic nisi
                        ratione repellendus suscipit totam vitae!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- <hr> -->
                    <div class="bg-dark bg-none-md  rounded py-3"></div>
                </div>
            </div>
            @isModuleEnabled('FeaturedProducts')
            @include('featuredproducts::frontpagedisplay')
            @endisModuleEnabled

            <div class="row mt-4">

                <div class="col-md-4">
                    <h4>
                        Top Vendors
                    </h4>
                    <hr>
                    @foreach(\App\Vendor::topVendors() as $vendor)
                    <table class="table table-borderless table-hover">
                        <tr>
                            <td>
                                <a href="{{route('vendor.show',$vendor)}}" style="text-decoration: none; color:#212529">{{$vendor->user->username}}</a>
                            </td>
                            <td class="text-right">
                                <span class="btn btn-sm @if($vendor->vendor->experience >= 0) btn-primary @else btn-danger @endif active" style="cursor:default">Level {{$vendor->getLevel()}}</span>

                            </td>
                        </tr>
                    </table>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h4>
                        Latest orders
                    </h4>
                    <hr>
                    @foreach(\App\Purchase::latestOrders() as $order)
                    <table class="table table-borderless table-hover">
                        <tr>
                            <td>
                                <img class="img-fluid" height="23px" width="23px" src="{{ asset('storage/'  . $order->offer->product->frontImage()->image) }}" alt="{{ $order->offer->product->name }}">
                            </td>
                            <td>
                                {{str_limit($order->offer->product->name,50,'...')}}
                            </td>
                            <td class="text-right">
                                {{$order->getSumLocalCurrency()}} {{$order->getLocalSymbol()}}
                            </td>
                        </tr>
                    </table>
                    @endforeach
                </div>

                <div class="col-md-4">
                    <h4>
                        Rising vendors
                    </h4>
                    <hr>
                    @foreach(\App\Vendor::risingVendors() as $vendor)
                    <table class="table table-borderless table-hover">
                        <tr>
                            <td>
                                <a href="{{route('vendor.show',$vendor)}}" style="text-decoration: none; color:#212529">{{$vendor->user->username}}</a>
                            </td>
                            <td class="text-right">
                                <span class="btn btn-sm @if($vendor->vendor->experience >= 0) btn-primary @else btn-danger @endif active" style="cursor:default">Level {{$vendor->getLevel()}}</span>
                            </td>
                        </tr>
                    </table>
                    @endforeach
                </div>


            </div>


        </div>
    </div>

</div>

@stop