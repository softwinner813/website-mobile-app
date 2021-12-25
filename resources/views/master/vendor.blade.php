@extends('master.main')

@section('title','Vendor - ' . $vendor -> username )

@section('content')
{{-- Breadcrumbs --}}
<nav class="main-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb bg-dark-l">

        <li class="breadcrumb-item" aria-current="page">{{ config('app.name') }}</li>
        <li class="breadcrumb-item" aria-current="page">Vendor</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $vendor -> username }}</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-10">
        <h4>Items for sale <a href="{{route('search',['user'=>$vendor->username])}}" class="ml-2" style="font-size: 0.9em; text-decoration: none;">({{$vendor->products()->count()}})</a></h4>
    </div>
    <div class="col-md-2 text-md-right">
        <a href="{{route('search',['user'=>$vendor->username])}}" class="text-light">See all items</a>
    </div>
</div>

<div class="d-lg-none">
    <div class="mb-5 pb-5">
        @include('includes.vendor.card')
    </div>
</div>

<div class="row">
    <div class="col-lg-8 rounded pt-2">
        <div class="row mt-2">
            @foreach($vendor->recentProducts(4) as $product)
            <div class="col-md-4 col-sm-6 mb-2">
                @include('includes.product.card',$product)
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4 d-none d-lg-inline-block">
        <div class="mb-5 pb-5">
            @include('includes.vendor.card')
        </div>
    </div>
</div>

@stop