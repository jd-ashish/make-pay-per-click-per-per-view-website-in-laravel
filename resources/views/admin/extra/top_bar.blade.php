<!-- top bar navigation -->
<div class="headerbar">

    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="{{ route('home') }}" class="logo">
            <img alt="Logo" src="{{ url('/') }}/{{ setting_val('fevicon_thumbnail')}}" />
            <span>{{ env('APP_NAME') }}</span>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none"href="{{ url('/') }}" >
                    <i class="fa fa-globe"></i>
                </a>

                

            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    @if (count(Auth::user()->Notification)<1)
                        
                        @else
                        @if (count(\App\Notificaton::where('view',0)->get())>0)
                            <span class="notif-bullet"></span>
                        @else
                            
                        @endif
                        
                    @endif
                    
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg" >
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>
                            <small>
                                <span class="label label-danger pull-xs-right ntfy-cnt" nf-cnt="{{ count(Auth::user()->Notification) }}">{{ count(Auth::user()->Notification) }}</span>Notification</small>
                        </h5>
                    </div>
                    
                    <div style="height: 300px; overflow-y: scroll">
                        @if (count(Auth::user()->Notification)<1)
                            <a href="#" class="dropdown-item notify-item">
                                <h4>No any notification for you</h4>
                            </a>
                        @endif
                        <div class="sss">
                            @foreach (Auth::user()->Notification as $key => $value)
                            <a href="#" class="dropdown-item notify-item nofify-view  "   title="{{ $value->title }}" id="{{ $value->id }}" desc="{{ $value->description }}" cat="{{ Time_ago(strtotime($value->created_at)) }}">
                                <div class="notify-icon bg-faded">
                                    @if ($value->type=="credit" || $value->type=="success")
                                        <img src="{{ asset('setting/success.gif')}}" alt="img" class="rounded img-fluid" >
                                    @else
                                        <img src="https://cdn1.iconfinder.com/data/icons/files-folders-vol-2/64/folder-error_2-512.png" alt="img" class="rounded img-fluid">
                                    @endif
                                    {{-- <img src="https://cdn1.iconfinder.com/data/icons/files-folders-vol-2/64/folder-error_2-512.png" alt="img" class="rounded-circle img-fluid"> --}}
                                </div>
                                <p class="notify-details" >
                                    <b class="{{ $value->id }}" @if($value->view >0) style="font-size:12px;" @else style="font-weight: bold; font-size:12px;" @endif>{{ $value->title }}</b>
                                    <span class="{{ $value->id }}b" @if($value->view >0) style="font-size:12px;" @else style="font-weight: bold; font-size:12px;" @endif>{{ $value->description }}</span>
                                    <small class="text-muted">{{ Time_ago(strtotime($value->created_at)) }}</small>
                                </p>
                            </a>
                        @endforeach
                        </div>
                        
                    </div>

                    
                   

                    <!-- All-->
                    <a href="#" class="dropdown-item notify-item notify-all NotificationViewAll">
                        View All Allerts
                    </a>

                </div>
            </li>


            @if (Auth::user()->user_type=="admin")
                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-sm">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5>
                                <small>Settings</small>
                            </h5>
                        </div>

                        <!-- item-->
                        <a href="{{ route('account.settings') }}" class="dropdown-item notify-item">
                            <p class="notify-details ml-0">
                                <i class="fas fa-cog"></i>
                                <b>Account settings</b>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="{{ route('frontend.settings') }}" class="dropdown-item notify-item">
                            <p class="notify-details ml-0">
                                <i class="fas fa-cog"></i>
                                <b>frontend </b>
                            </p>
                        </a>

                    </div>

                </li>
            @endif
            


            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                    <img src="@if( Auth::user()->details) @if(Auth::user()->details->avtar_image != "") {{ url('/') }}/{{ Auth::user()->details->avtar_image }} @else {{ asset('assets/images/avatars/admin.png') }} @endif @else {{ asset('assets/images/avatars/admin.png') }} @endif" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow">
                            <small>Hello, {{ Auth::user()->name }}</small>
                        </h5>
                    </div>

                    <!-- item-->
                    <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
<!-- End Navigation -->
@section('script')

@endsection