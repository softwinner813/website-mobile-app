<a href="{{route('vendor.show.feedback',['user'=>$vendor])}}" class="float-right">See all feedback</a>
<h5 class="mb-3">Feedback ratings</h5>


<div class="row justify-content-around">
    <div class="">
        <span>Quality:</span><br>
        <span>Communication:</span><br>
        <span>Shipping:</span>
    </div>
    <div class="">
        <span>
            @include('includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('quality_rate')]) ({{ $vendor -> vendor -> avgRate('quality_rate') }})
        </span>
        <span> <br>
            @include('includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('communication_rate')]) ({{ $vendor -> vendor -> avgRate('communication_rate') }})
        </span> <br>
        <span>
            @include('includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('shipping_rate')]) ({{ $vendor -> vendor -> avgRate('shipping_rate') }})
        </span>
    </div>
    <div class="col-12 mt-2">

        <div class="row text-md-center">
            <div class="col-4">
                <span class="fas fa-plus-circle text-success"></span> {{$vendor->vendor->countFeedbackByType('positive')}}
                Positive
            </div>
            <div class="col-4">
                <span class="fas fa-stop-circle text-secondary"></span> {{$vendor->vendor->countFeedbackByType('neutral')}}
                Neutral
            </div>
            <div class="col-4">
                <span class="fas fa-minus-circle text-danger"></span> {{$vendor->vendor->countFeedbackByType('negative')}}
                Negative
            </div>
        </div>
    </div>


</div>