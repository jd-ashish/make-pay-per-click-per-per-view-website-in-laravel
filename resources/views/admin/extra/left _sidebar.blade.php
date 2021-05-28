<!-- Left Sidebar -->
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>
                <li class="submenu">
                    <a class="active" href="{{ url('/') }}/home">
                        <i class="fas fa-bars"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @if (Auth::user()->user_type=="admin")
                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-user"></i>
                            <span> Manage users </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li class="submenu">
                                <a href="{{ route('users.index') }}">
                                    <span> Users </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('send_email.users') }}">Send email</a>
                            </li>
                        </ul>
                    </li>
                    
                @endif
                @if (Auth::user()->user_type=="admin")
                    <li class="submenu">
                        <a href="{{ route('refer.index') }}">
                            <i class="fas fa-tree"></i>
                            <span> Ref Commission </span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type=="admin")
                    <li class="submenu">
                        <a href="{{ route('ptc.index') }}">
                            <i class="fas fa-link"></i>
                            <span> PTC Ads </span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type=="admin")
                    <li class="submenu">
                        <a href="{{ route('membership.index') }}">
                            <i class="fas fa-tags"></i>
                            <span> Membership </span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type=="admin")
                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-mail-bulk"></i>
                            <span> Email Manager </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('email.config') }}">Email Config</a>
                            </li>
                            <li>
                                <a href="{{ route('email.global_template') }}">Global Template</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->user_type=="admin")
                    <li>
                        <a href="{{ route('sms.config') }}">
                            <i class="fas fa-sms"></i>
                            SMS Config
                        </a>
                    </li>
                @endif
                
                @if (Auth::user()->user_type=="user")
                    <li>
                        <a href="{{ route('MyAds.index') }}">
                            <i class="fas fa-tags"></i>
                            Ads
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Transaction.index') }}">
                            <i class="fas fa-book"></i>
                            Transactions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wallet.index') }}">
                            <i class="fas fa-wallet"></i>
                            Wallet
                        </a>
                    </li>
                    @if(App\Models\Testimonials::where('user_id',Auth::user()->id)->first())
                    
                    @else
                        <li class="reate-us">
                            <a href="#" >
                                <i class="fas fa-wallet"></i>
                                RateUs
                            </a>
                        </li>
                    @endif
                    
                    {{-- <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-mail-bulk"></i>
                            <span> My ads </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('MyAds.index') }}">Ads</a>
                            </li>
                            <li>
                                <a href="{{ route('email.global_template') }}">Global Template</a>
                            </li>
                        </ul>
                    </li> --}}
                @endif
                @if (Auth::user()->user_type=="user")
                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-mail-bulk"></i>
                            <span>Referral </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('Referral.commission') }}">Commission</a>
                            </li>
                            <li>
                                <a href="{{ route('Referral.user') }}">Refered user</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->user_type=="user")
                <li class="submenu">
                    <a href="{{ route('withdraw.index') }}">
                        <i class="fas fa-tags"></i>
                        <span> Withdrawl now </span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->user_type=="admin")
                    <li class="submenu">
                        <a href="{{ route('faq.index') }}">
                            <i class="fas fa-tags"></i>
                            <span> FAQ </span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type=="admin")
                    <li class="submenu">
                        <a href="{{ route('seo.index') }}">
                            <i class="fas fa-tags"></i>
                            <span> SEO </span>
                        </a>
                    </li>
                @endif
                

               

            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->