@extends('master.confirmation')

@section('confirmation-title', 'Exchange Conform')

@section('confirmation-content')
	<div class="alert text-center alert-warning">This action can't be undone! Confirm that you want to exchange</div>
    
    @vendor
    <h5 class="text-warning text-center">${{$balance}} USD 
 		&nbsp; TO {{strtoupper($coin)}}
    </h5>
    <h6 class="text-center text-primary">Total: {{$total}} {{strtoupper($coin)}}</h6>
    <h6 class="text-center text-danger"> Fee: -{{$fee}} {{strtoupper($coin)}} ({{$feeRate}}%)</h6>
    <h6 class="text-center text-success"> Receive: {{$receive}} {{strtoupper($coin)}}</h6>
    @else
    <h5 class="text-warning text-center">{{$balance}} {{strtoupper($coin)}} 
 		&nbsp; TO USD
    </h5>
    <h6 class="text-center text-primary">Total: ${{$total}}</h6>
    <h6 class="text-center text-danger"> Fee: -${{$fee}} ({{$feeRate}}%)</h6>
    <h6 class="text-center text-success"> Receive: ${{$receive}}</h6>
    
    @endif
@endsection

@section('confirmation-back', route('profile.exchange'))
@section('confirmation-next', route('profile.exchange.submit',['coin' => base64_encode($coin), 'balance' => base64_encode($balance)]))