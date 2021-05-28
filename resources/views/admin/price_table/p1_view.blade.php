<div class="row">

    <div class="col-12">

        <div class="card mb-3">
            <div class="card-header">
                <h3>
                    <i class="fas fa-table"></i> My plan</h3>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                @if (Auth::user()->Account)
                <table class="table table-condensed table-hover table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th class="tabco1" style="min-width:200px">PLAN</th>
                            
                                
                           
                            @foreach (\App\Models\Membership::where('status','on')->where('id',Auth::user()->Account->membership_id)->get() as $key => $item)
                                <th class="tabco2" style="min-width:200px">{{ $item->name }}</th>
                            @endforeach
                            
                            {{-- <th class="tabco3" style="min-width:200px">Plus</th>
                            <th class="tabco4" style="min-width:200px">Pro</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tabco1">Price </td>
                            @foreach (\App\Models\Membership::where('status','on')->where('id',Auth::user()->Account->membership_id)->get() as $key => $item)
                                <td class="tabco2">
                                    {{ $item->price }} {{ env('CURRENCY_TYPE') }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="tabco1">Daily limit</td>
                            @foreach (\App\Models\Membership::where('status','on')->where('id',Auth::user()->Account->membership_id)->get() as $key => $item)
                                <td class="tabco2">
                                    <b>{{ $item->daily_limit }} PTC</b>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="tabco1">Referral Cmmission</td>
                            @foreach (\App\Models\Membership::where('status','on')->where('id',Auth::user()->Account->membership_id)->get() as $key => $item)
                                <td class="tabco2">
                                    <b>{{ $item->referral_commission }} %</b>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="tabco1">Referral Cmmission</td>
                            @foreach (\App\Models\Membership::where('status','on')->where('id',Auth::user()->Account->membership_id)->get() as $key => $item)
                                <td class="tabco2">
                                    <b>{{ $item->referral_commission }} %</b>
                                </td>
                            @endforeach
                        </tr>
                        
                    </tbody>
                </table>
                 @endif
                </div>
                
            </div>
            <!-- end card body -->

        </div>
        <!-- end card-->

    </div>
    <!-- end col-->
</div>
