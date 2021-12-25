@extends('master.profile')

@section('profile-content')
    @include('includes.flash.error')
    @include('includes.flash.success')

    <h1 class="my-3">
        <i class="mr-2 far fa-money-bill-alt"></i>
        Deposit
    </h1>

    <h3 class="mt-4">Generate Deposit Address</h3>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('profile.deposit.getAddress') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    
                    <div class="col-md-6">
                        <select name="coin" id="coin" class="form-control form-control-md d-flex">
                            <option>Coin</option>
                            @foreach(config('coins.coin_list') as $supportedCoin => $instance)
                                <option value="{{ $supportedCoin }}">{{ strtoupper(\App\Address::label($supportedCoin)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 ">
                        <button class="btn btn-block btn-success btn-md">Generate Address</button>
                    </div>
                    <div class="col-md-12 mt-4">
                        <input type="text" class="form-control form-control-md d-flex" name="address" id="address" placeholder="Here will be address to deposit" readonly
                        value="@if($history->isNotEmpty() && $history[0]->status == 0){{$history[0]->address}}@endif">
                    </div>

                </div>
            </form>
            <br>
            <p class="text-muted">Once click GENERATE button, you will get a address to deposit.On this address you will receive coin from deposit! Funds will be charged to your account!</p>

            <h3 class="mt-4 col-md-12">Deposit History
                <!-- <button style="float: right;" class="btn  btn-outline-danger"><i class="fa fa-trash"></i></button> -->
                <a href="{{route('profile.deposit')}}" class="mr-2 btn btn-outline-success" style="float: right;"><i class="fa fa-refresh">&#xf021;</i></a>
            </h3>

            @if($history->isNotEmpty())
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Coin</th>
                        <th class="text-right">Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $key => $deposit)
                        <tr>
                            <td class="text-muted">{{$deposit->updated_at}}</td>
                            <td class="text-muted">
                                @if($deposit->status)
                                {{substr(base64_decode($deposit->address), 0,5)}}...{{substr(base64_decode($deposit->address), -5,strlen($deposit->address))}}
                                @else
                                {{substr($deposit->address, 0,5)}}...{{substr($deposit->address, -5,strlen($deposit->address))}}
                                @endif
                            </td>
                            <td><span class="badge badge-info">{{strtoupper($deposit->coin)}}</span></td>
                            <td class="text-muted text-right">
                                {{$deposit->balance}}
                            </td>

                            <td class="text-muted text-right">
                                
                                @if($deposit->balance > 0 && $deposit->status == 0)
                                <a href="{{ route('profile.deposit.add', $deposit->id) }}" class="btn btn-primary btn-md"><i class="fa fa-plus mr-1"></i>Deposit</a>
                                @else
                                <a href="{{ route('profile.deposit.delete', $deposit->id) }}" class="btn btn-danger btn-sm text-sm"><i class="fa fa-trash mr-1"></i>Delete</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
           
            @else
                <div class="alert text-center alert-warning">Your deposit history is empty!</div>
            @endif


             
        </div>
    </div>
        
    

@stop