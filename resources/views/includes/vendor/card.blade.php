<div class="card profile-card border border-secondary bg-dark-l">
    <div class="card-body">
        <div class="nameBOx w-100 ">
                <div class="row no-gutters">
                <h4><a href="{{ route('vendor.show', $vendor) }}" style="color: black" class="text-uppercase text-light">{{ $vendor -> username }}</a></h4>
            </div>
            <div class="row">
                <div class="col-6 pl-2">
                    <div class="levelBox">
                        <p> <span class="btn btn-sm @if($vendor->vendor->experience >= 0) btn-primary @else btn-danger @endif active" style="cursor:default">Level {{$vendor->vendor->getLevel()}}</span>
                            <span class="@if($vendor->vendor->experience < 0) text-danger @endif">({{$vendor->vendor->getShortXP()}} XP)</span>
                        </p>
                    </div>
                    @if($vendor->vendor->isTrusted())
                    <p class="badge badge-success">Trusted vendor <span class="fa fa-check-circle"></span></p>
                    @endif
                    @if($vendor->vendor->isDwc())
                    <p class="badge badge-danger">Deal with caution <span class="fa fa-exclamation-circle"></span></p>
                    @endif

                </div>
                <div class="col-6">
                    <a href="{{ route('profile.messages').'?otherParty='.$vendor->username}}" style="white-space: nowrap;" class="btn btn-outline-light btn-sm"><span class="fas fa-envelope"></span> Send message</a>
                </div>
            </div>
            <p class="mt-2 text-justify mb-0">
                {{$vendor->vendor->about}}
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam in ad incidunt inventore itaque expedita.
            </p>
            <div class="col-12 mt-2">
                <hr>
                <div class="">
                    <div>Member since:
                        <span class="font-weight-semibold float-right">{{$vendor->memberSince()}}</span>
                    </div>

                    <div>Disputes in last year
                        <span class="float-right font-weight-bolder">
                            ( <span class="text-success">won</span>/<span class="text-danger">lost</span>): <span class="text-success font-weight-semibold">{{$vendor->vendor->disputesLastYear(true)}}</span>/
                            <span class="text-danger font-weight-semibold">{{$vendor->vendor->disputesLastYear(false)}}</span>
                        </span>
                    </div>

                    <div>Rated Orders:
                        <span class="font-weight-semibold float-right font-weight-bolder">{{$vendor->vendor->countFeedback()}}</span>
                    </div>
                </div>
                <div>Vendor since:
                    <span class="font-weight-semibold float-right font-weight-bolder">{{$vendor->vendor->vendorSince()}}</span>
                </div>

                <div>Completed orders:
                    <span class="font-weight-semibold float-right font-weight-bolder">{{$vendor->vendor->completedOrders()}}</span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('includes.vendor.feedback')
            </div>
        </div>

    </div>
</div>