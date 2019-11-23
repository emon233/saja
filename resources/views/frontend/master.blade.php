<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.inc.head')
    @yield('css')
    <style type="text/css">
        .sidebarmenu {
            height: 30px;
            background-color: #336633;
            font-size: 20px;
            text-align: left;
            font-weight: 700;
            color: #fff;
            padding: 0px;
            text-decoration: none;
        }

        .menub {
            height: 3px;
            background-color: #fff;
        }

        .menu1 {
            height: 30px;
            background-color: #996633;
            font-size: 20px;
            text-align: left;
            font-weight: 700;
            color: #fff;
            padding: 5px;
            text-decoration: none;
        }
    </style>

    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/js/body.js"></script>
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        @include('frontend.inc.top-header')
        <!-- Top Header Area -->


        <!-- Navbar Area -->
        <div class="newspaper-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newspaperNav">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/logo.png') }}" alt="" style="height:70px; width:70px;"></a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('front') }}">Home</a></li>
                                    <li><a href="{{ route('index.authors_guideline') }}">Authors Guideline</a></li>
                                    <li><a href="{{ route('index.editorial_board') }}">Editorial Board</a></li>
                                    <li><a href="{{ route('index.publication_fees') }}">Publication Fee</a></li>
                                    <li><a href="{{ route('index.payment_method') }}">Payment Method</a></li>
                                    <li><a href="{{ route('index.publication_ethics') }}">Publication Ethics</a></li>
                                    <li><a href="{{ route('index.contact') }}">Contact</a></li>
                                    <li><a href="#">Archives</a></li>
                                    <li><a href="{{ route('index.links') }}">Important Links</a></li>
                                    <!-- Authentication Links -->
                                    @guest
                                    <li class="{{ (Request::is('important-links') ? 'active' : '') }}">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @else

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->last_name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <i class="fa fa-tachometer"></i>
                                            {{ Session::get('role') }} Dashboard
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-user"></i>
                                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} (Profile)
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>

                                    @endguest
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->

    <div class="container">
        <div class="row align-items-center hidden justify-content-center">
            <img src="{{ asset('frontend/img/1.jpg') }}" class="img-responsive" style="width: 50%; height:15%;">
        </div>
    </div>

    <!-- ##### Hero Area End ##### -->

    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area" style="padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="list-group">
                        <a href="{{ route('register') }}" class="list-group-item active"><i class="fa fa-key"></i> <span>Online Submission System</span></a>
                        <a href="{{ route('login') }}" class="list-group-item"><i class="fa fa-credit-card"></i> <span>Article Tracking System</span></a>
                        <a href="{{ route('index.publication_ethics') }}" class="list-group-item"><i class="fa fa-question-circle"></i> <span>Publication Ethics</span></a>
                        <a href="{{ route('index.editorial_board') }}" class="list-group-item"><i class="fa fa-arrow-circle-o-left"></i> <span>Editorial Board</span></a>
                        <a href="{{ route('index.current_issue') }}" class="list-group-item"><i class="fa fa-arrow-circle-o-right"></i> <span>Current Issue</span></a>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('frontend.inc.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('frontend/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('frontend/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('frontend/js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('frontend/js/active.js') }}"></script>
    <!-- Fon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/fontawesome.min.js"></script>

    <script language="javascript" type="text/javascript"></script>
    @yield('js')
</body>

</html>