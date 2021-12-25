<!-- <div class="col-md-4 my-md-0 my-2 col-12 py-2"> -->
    <div class="card p-2 bg-dark-l mb-2">
        <a href="{{ route('product.show', $product) }}">
            <img class="card-img-top" src="{{ asset('storage/'  . $product -> frontImage() -> image) }}" alt="{{ $product -> name }}" class="img-fluid">
        </a>
        <h4 class="card-title mt-2">{{ $product -> name }}</h4>
        <div class="card-body px-2 py-1">
            <div class="">
                Seller:
                <a href="{{ route('vendor.show', $product -> user) }}" class="btn btn-sm border-0 rounded-pill btn-danger">{{ $product -> user -> username }}</a> <br>
            </div>
            <div class="my-2">
                <!--<i class="fas fa-user"></i>-->
                <div class="d-inline-block bg-danger p-2 rounded-circle mt-2"></div>
                <a href="#" class="d-inline-block text-success font-weight-bolder">{{ $product -> category -> name }}</a>
                <!--<span class=""><button class="btn btn-sm border-0 rounded-pill btn-info">{{ $product -> type }}</button></span>-->
            </div>
            <div>
                <span>From:</span> <span class="pl-3">USA</span> 
            </div>
             <div>
                <span>Shipped To:</span> <span class="">Worldwide</span> 
            </div>
            <div class="">
                <p class="font-weight-bolder d-inline-block">
                    From: <strong>{{ $product->getLocalPriceFrom() }} {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}</strong> | Quantity: 
                                    <span class="">{{ $product -> quantity }}</span> Left

                </p>
                <a href="{{ route('product.show', $product) }}" class="btn btn-block btn-sm btn-dark bg-dark float-right"><i class="fas fa-shopping-cart"></i> Buy</a>
            </div>
        </div>
    </div>
<!-- </div> -->