    <h1 class="my-3">
        <i class="mr-2 mr-2 fas fa-exchange-alt"></i>
        Exchanage 
    	<span class="text-right badge badge-success " style="font-size: 14px;">Coin to USD</span>
    </h1>
    
    <hr>
    <div class="exchange-panel">
        <div class="row">
            <div class="col-md-5 col-sm-12 exchange-balance">
                <div class="col-md-12">
                    <h5 class="text-center text-light"> Your Balance</h5>
                    
                </div>
                <!-- BTC -->
                <div class="col-12">
                    <h6 class="text-light">
                        <strong class="text-danger">BTC: &nbsp;</strong> 
                        <label class="text-right">{{auth()->user()->btc_balance}}</label>
                    </h6>
                </div>
                <!-- XMR -->
                <div class="col-12">
                    <h6 class="text-light">
                        <strong class="text-danger">XMR: &nbsp;</strong> 
                        <label class="text-right">{{auth()->user()->xmr_balance}}</label>
                    </h6>
                </div>
                <!-- USD -->
                <div class="col-12">
                    <h6 class="text-light">
                        <strong class="text-danger">USD: &nbsp;</strong> 
                        <label class="text-right">{{auth()->user()->usd_balance}}</label>
                    </h6>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                <form action="{{ route('profile.exchange.detail') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-md-6 col-sm-12">
                            <select name="coin" id="coin" class="form-control form-control-md d-flex" value="usd">
                                <!-- <option>Coin</option> -->
                                @foreach(config('coins.coin_list') as $supportedCoin => $instance)
                                    <option value="{{ $supportedCoin }}">{{ strtoupper(\App\Address::label($supportedCoin)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <input type="number" step="0.00001" max="100.0" min="0.00" class="form-control form-control-md d-flex" name="balance" id="balance" placeholder="0.00" 
                            value="0.00" >
                        </div>
                        <h6 class=" col-md-12 text-center text-light mt-2">
                            <span class="badge badge-info">1 BTC</span>
                            <i class="fas fa-exchange-alt"></i> 
                            <span class="badge badge-success">${{$btcToUsd}} USD</span>
                        </h6>
                        <h6 class="col-md-12  text-center text-light">
                            <span class="badge badge-info">1 XMR</span>
                            <i class="fas fa-exchange-alt"></i> 
                            <span class="badge badge-success">${{$xmrToUsd}} USD</span>
                        </h6>
                        <div class="col-md-12 mt-2">
                            <button class="btn btn-block btn-success btn-md">
                                <i class="mr-2 fas fa-exchange-alt"></i> EXCHANGE</button>
                        </div>
                        

                    </div>
                </form>
                <br> 
            </div>
        </div>
    </div>

    