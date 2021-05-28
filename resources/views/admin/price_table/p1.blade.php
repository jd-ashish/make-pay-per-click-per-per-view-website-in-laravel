<div class="row">

    <div class="col-12">

        <div class="card mb-3">
            <div class="card-header">
                <h3>
                    <i class="fas fa-table"></i> Pricing table example 1</h3>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                <table class="table table-condensed table-hover table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th class="tabco1" style="min-width:200px">PLAN</th>
                            @foreach (\App\Models\Membership::where('status','on')->get() as $key => $item)
                                <th class="tabco2" style="min-width:200px">{{ $item->name }}</th>
                            @endforeach
                            
                            {{-- <th class="tabco3" style="min-width:200px">Plus</th>
                            <th class="tabco4" style="min-width:200px">Pro</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tabco1">Price </td>
                            @foreach (\App\Models\Membership::where('status','on')->get() as $key => $item)
                                <td class="tabco2">
                                    {{ $item->price }} {{ env('CURRENCY_TYPE') }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="tabco1">Daily limit</td>
                            @foreach (\App\Models\Membership::where('status','on')->get() as $key => $item)
                                <td class="tabco2">
                                    <b>{{ $item->daily_limit }} PTC</b>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="tabco1">Referral Cmmission</td>
                            @foreach (\App\Models\Membership::where('status','on')->get() as $key => $item)
                                <td class="tabco2">
                                    <b>{{ $item->referral_commission }} %</b>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="tabco1">Referral Cmmission</td>
                            @foreach (\App\Models\Membership::where('status','on')->get() as $key => $item)
                                <td class="tabco2">
                                    <b>{{ $item->referral_commission }} %</b>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class=""></td>
                            @foreach (\App\Models\Membership::where('status','on')->get() as $key => $item)
                                <td class="">
                                    <button data-fancybox="modal" data-src="#buy_premium{{ $key }}" role="button"  class="btn btn-facebook" data-id="1">Subscribe Now</button>
                                </td>

                                {{-- <div id="buy_premium" style="display: none; padding: 40px ; max-width: 85%;">
    
                                    <h4>Buy Subscribe {{ env('CURRENCY_TYPE') }} {{ $item->price }}</h4>
                                    
                                </div> --}}
                                <div id="buy_premium{{ $key }}" style="display: none; padding: 50px 5vw; max-width: 800px;text-align: center;">
                                    <h4>Buy Subscribe from {{ env('CURRENCY_TYPE') }} {{ $item->price }}</h4>
            
                                    <p>This Subscriction no time limit to access but some function will be limited as per given item
                                    </p>
            
                                    <p>
                                        <form action="{{ route('trantransaction.pay') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="amount" value="{{ $item->price }}">
                                            <input type="hidden" name="member_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-success" role="button" >Confirm or pay {{ env('CURRENCY_TYPE') }} {{ $item->price }}</button>
                                        </form>
                                        
                                        <a data-fancybox-close class="btn btn-info" role="button" href="#">Cancel</a>
                                    </p>
            
                                    <p style="color: #aaa; font-size: 90%;">Simply click or pay get offer .</p>
                                </div>
                            @endforeach
                        </tr>
                        
                    </tbody>
                </table>
                </div>
                
            </div>
            <!-- end card body -->

        </div>
        <!-- end card-->

    </div>
    <!-- end col-->
</div>
