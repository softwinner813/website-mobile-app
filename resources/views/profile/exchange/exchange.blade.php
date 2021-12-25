@extends('master.profile')

@section('profile-content')
    @include('includes.flash.error')
    @include('includes.flash.success')

    @vendor
    @include('includes.profile.exchange.vendor')
    @else
    @include('includes.profile.exchange.buyer')
    @endvendor

    <hr>
    <h3 class="mt-4 col-md-12">Exchange History</h3>

    @if($history->isNotEmpty())
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th class="text-right">From</th>
                <th class="text-right">To</th>
                <th class="text-right">Fee</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $key => $exchange)
                <tr>
                    <td class="text-muted">{{$exchange->created_at}}</td>
                    <td class="text-muted text-right">
                        
                        <span class="badge badge-info">
                            @vendor $ @endvendor{{$exchange->from_amount}} {{strtoupper($exchange->from_currency)}}
                        </span>
                    </td>
                    <td class="text-muted text-right">
                       
                        <span class="badge badge-success">
                            @vendor 
                            @else
                            $
                            @endvendor
                            {{$exchange->to_amount}} {{strtoupper($exchange->to_currency)}}
                        </span>
                    </td>
                    <td class="text-muted text-right">
                        <span class="badge badge-danger">-
                            @vendor 
                            @else
                            $
                            @endvendor
                            {{$exchange->fee}}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
   
    @else
        <div class="alert text-center alert-warning">Your exchange history is empty!</div>
    @endif

@stop