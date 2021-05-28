<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="revisit-after" content="{{ seo()->revisit }} days">
            <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index, follow">

        <title>{{ env('APP_NAME', setting_val('APP_NAME')) }}</title>

        @yield('meta')


      <meta name="description" content="{{ seo()->description }}">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="{{ seo()->author }}">
      <meta name="sitemap_link" content="{{ seo()->sitemap_link }}">
      <meta name="keywords" content="@yield('meta_keywords', seo()->keyword)">
      <meta itemprop="name" content="{{ seo()->app_title }}">
      <meta itemprop="description" content="{{ seo()->description }}">
      <meta itemprop="image" content="{{ url('/') }}/{{ setting_val('fevicon_image') }}">
      <!-- Favicon -->
      <link type="image/x-icon" href="{{ url('/') }}/{{ setting_val('fevicon_thumbnail') }}" rel="shortcut icon" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

  <link href="{{ asset('fontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('fontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('fontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('fontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('fontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('fontend/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('fontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('fontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('fontend/assets/css/style.css') }}" rel="stylesheet">
</head>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/') }}">{{ env('APP_NAME') }}</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#faq">Faq</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      @if (Auth::check())
        <a href="{{ route('home') }}" class="get-started-btn scrollto">dashbord</a>
      @else
        <a href="{{ route('login') }}" class="get-started-btn scrollto">Login</a>
      @endif
      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>{{ env('APP_DESC') }}</h1>
          {{-- <h2>We are team of talented designers</h2> --}}
        </div>
      </div>
      <div class="text-center">
        @if (Auth::check())
          <a href="{{ route('home') }}" class="get-started-btn scrollto">Continue</a>
        @else
        <a href="{{ route('register') }}" class="btn-get-started scrollto">Signup now</a>
        @endif
        
      </div>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title"><a href="">Daily ads</a></h4>
            <p class="description">Best price to see ads</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title"><a href="">Instant collect money</a></h4>
            <p class="description">Amount will automatice collect in your wallet instantly</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title"><a href="">High rated ads</a></h4>
            <p class="description">Publish and create ads with design</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="icofont-money"></i></div>
            <h4 class="title"><a href="">Withdrawl </a></h4>
            <p class="description">Withdrawl with in a day</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <?= setting_val("about_us")?>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row justify-content-end">

          <div class="col-lg-6 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">{{ count(App\Models\User::get()) }}</span>
              <p>Happy Clients</p>
            </div>
          </div>

          {{-- <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">85</span>
              <p>Projects</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">12</span>
              <p>Years of experience</p>
            </div>
          </div> --}}

          <div class="col-lg-6 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">
                @php
                $wiht = \App\Models\Withdraw::get();
                @endphp
                @if($wiht)
                    @php
                        $amt_with = 0;
                        $c4 = 0;
                    @endphp
                    @foreach ($wiht as $key => $value)
                        @php
                            $amt_with += $value->amount;
                            $c4++;
                        @endphp
                    @endforeach
                        @php
                            $user_st = \App\Models\User::get();
                        @endphp
                        @if($user_st)
                            @php
                                $u_bal = 0;
                            @endphp
                            @foreach ($user_st as $key => $value)
                                @php
                                    $u_bal += $value->balance;
                                @endphp
                            @endforeach
                            {{ (int)$u_bal+$amt_with }}
                        @endif
                @endif
              </span>
              <p>Awards in {{ env('CURRENCY_TYPE') }}</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          {{-- <p></p> --}}
        </div>

        <div class="owl-carousel testimonials-carousel">

            @foreach (\App\Models\Testimonials::where('status','on')->get() as $key => $item)
                <div class="testimonial-item">
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    {{ $item->description }}
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="{{ App\Models\UsersDetails::where('uid',$item->user_id)->first()->avtar_thumbnail }}" class="testimonial-img" alt="">
                    <h3>{{ App\Models\User::where('id',$item->user_id)->first()->name }}</h3>
                </div>
            @endforeach
          


        </div>

      </div>
    </section><!-- End Testimonials Section -->



    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          {{-- <p>desc.</p> --}}
        </div>

        <div class="row">

            @foreach (\App\Models\Membership::where('status','on')->get() as $key => $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-im" data-aos-delay="100">
                <div class="box">
                <h3>{{ $item->name }}</h3>
                <h4><sup>{{ env('CURRENCY_TYPE') }}</sup>{{ $item->price }}<span> </span></h4>
                <ul>
                    <li><b>{{ $item->daily_limit }} PTC</b> Daily limits</li>
                    <li><b>{{ $item->referral_commission }} %</b> Referral Cmmission</li>
                </ul>
                <div class="btn-wrap">
                    <a href="{{ route('register') }}" class="btn-buy">Buy Now</a>
                </div>
                </div>
            </div>
            @endforeach

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Benefits and Facilities</h2>
          <p>Description about if Benefits and Facilities have you keep other wise comment it.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bxl-dribbble"></i>
              </div>
              <h4><a href="">We're Global</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="icofont-earphone"></i>
              </div>
              <h4><a href="">Best Support</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-tachometer"></i>
              </div>
              <h4><a href="">Fater then your Expectation</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-yellow">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="icofont-chart-growth"></i>
              </div>
              <h4><a href="">We're Profitable</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-red">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                </svg>
                <i class="icofont-ssl-security"></i>
              </div>
              <h4><a href="">We're Secure</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-teal">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                </svg>
                <i class="icofont-certificate"></i>
              </div>
              <h4><a href="">We're Certified</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Sevices Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          {{-- <p></p> --}}
        </div>

        <div class="faq-list">
          <ul>
            @foreach (\App\Models\Faq::where('status','on')->get() as $key => $item)
            @if ($key==0)
                <li data-aos="fade-up">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-{{ $item->id }}">{{ $item->q }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-{{ $item->id }}" class="collapse show" data-parent=".faq-list">
                    <p>
                        {{ $item->a }}
                    </p>
                    </div>
                </li>
            @else
            <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> 
                <a data-toggle="collapse" href="#faq-list-{{ $item->id }}" class="collapsed">
                    {{ $item->q }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                </a>
                <div id="faq-list-{{ $item->id }}" class="collapse" data-parent=".faq-list">
                    <p>
                        {{ $item->a }}
                    </p>
                </div>
            </li>
            @endif
            
            
            @endforeach
            {{-- <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li> --}}

            

            

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->


<!-- ======= Services Section ======= -->
    <section id="pp" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="">
          <h2 class="text-center">Privacy and policy</h2>
          <p><?= setting_val('p_and_p')?></p>
        </div>


      </div>
    </section><!-- End Sevices Section -->

    <!-- ======= Services Section ======= -->
    <section id="tc" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div>
          <h2 class="text-center">Terms & conditions</h2>
          <p><?= setting_val('t_and_c')?></p>
        </div>


      </div>
    </section><!-- End Sevices Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          {{-- <p>.</p> --}}
        </div>

        <div>
          <?= setting_val('map_embed')?>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>{{ setting_val("address") }},{{ setting_val("city") }} , {{ setting_val("state") }}, {{ \App\Models\Country::where('id',setting_val("country"))->first()->country }} {{ setting_val("zip") }}</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>{{ setting_val('contact_email') }}</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>{{ setting_val('contact_phone') }}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('forms.contact') }}" method="post" role="form" class="php-email-form">
                @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>OnePage</h3>
            <p>
                {{ setting_val("address") }}
                <br>{{ setting_val("city") }} , {{ setting_val("state") }}, {{ \App\Models\Country::where('id',setting_val("country"))->first()->country }} {{ setting_val("zip") }} <br><br>
              <strong>Phone:</strong> {{ setting_val('contact_phone') }}<br>
              <strong>Email:</strong> {{ setting_val('contact_email') }}<br>
            </p>
          </div>

          <div class="col-lg-5 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#header">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#tc">Terms and conditions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#pp">Privacy policy</a></li>
            </ul>
          </div>

        

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p></p>
            <form action="{{ route('newsletter.join') }}" method="post">
                @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
            
            @php
                $newString = setting_val('footer_credit');  
                $newString = str_replace("{{app_name}}", "".setting_val('APP_NAME')."", $newString);  
                $newString = str_replace("{{app_link}}", "".url('/')."", $newString);
            @endphp
            <?= $newString?>
        </div>
        
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{ setting_val("twitter") }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ setting_val("facebook") }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ setting_val("instagram") }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ setting_val("google_plus") }}" class="google-plus"><i class="icofont-google-plus"></i></a>
        <a href="{{ setting_val("linkedin") }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('fontend/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('fontend/assets/js/main.js') }}"></script>
</html>
