<!-- Header Wrap -->

<div id="site-header-wrap">

    <!-- Header -->
    <header id="site-header">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">



        <div id="site-header-inner" class="">
            <div class="wrap-innerlogo clearfix container">
                <div id="site-logo" class="clearfix">
                    <div id="site-log-inner">
                        <a href="/home" rel="home" class="main-logo">
                            <img src="{{asset('assets/img/logo.png')}}" style="    max-height: 110px;" alt="">
                        </a>
                    </div>
                </div><!-- /#site-logo -->

                <div class="mobile-button">
                    <span></span>
                </div><!-- /.mobile-button -->

                <nav id="main-nav" class="main-nav">
                    <ul id="menu-primary-menu" class="menu">
                        <li class="menu-item current-menu-item">
                            <a href="{{route('home')}}">@lang('messages.main')</a>
                        </li>
                        {{-- <li class="menu-item">
                            <a href="#aboutUs">@lang('messages.about-us') </a>
                        </li> --}}
                        <li class="menu-item menu-item-has-children">
                            <a href="#">
                                @lang('messages.pages')
                            </a>
                            <ul class="sub-menu">

                            </ul>
                        </li>
                        {{-- <li class="menu-item">
                            <a href="#"> بدايتنا </a>
                        </li>--}}
                        <li class="menu-item menu-item-has-children">
                            <a href="#">
                                @lang('messages.categories')
                            </a>
                            <ul class="sub-menu">

                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="index-news"> @lang('messages.news')</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('get-contacts')}}">@lang('messages.Contact_us')</a>
                        </li>



                    </ul>

                </nav>
                <div id="header-search">





                    <div class="top-bar-socials">
                        <div class="inner">

                            <ul>
                                @guest
                                <li style="float: left;" class="menu-item-has-children dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle white-color"
                                        aria-haspopup="true" aria-expanded="false"> @lang('messages.dashboard') </a>
                                    <ul role="menu" class=" dropdown-menu">
                                        @if (Route::has('register'))
                                        <li class="menu-item">
                                            <a href="{{route('register')}}" style="margin-left: 10px;"
                                                class="themesflat-button bg-light-white big"><span>
                                                    @lang('messages.Register')</span></a>
                                        </li>
                                        @endif
                                        <li class="menu-item "><a style="margin-left: 10px;"
                                                class="themesflat-button bg-light-white big" href="{{route('login')}}">
                                                @lang('messages.Login')</a>
                                        </li>
                                        @else

                                        <li class="menu-item-has-children dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"
                                                aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"> <a
                                                        href="/profile">@lang('messages.my_profile')</a>
                                                </li>
                                                <li class="menu-item"> <a
                                                        href="{{route('users.getCourses')}}">@lang('messages.courses')</a>
                                                </li>
                                                <li class="menu-item"> <a
                                                        href="{{route('getCertifications')}}">@lang('messages.certifications')</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                        @lang('messages.Sign_out')
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                    @endguest

                            </ul>
                            </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div><!-- /.wrap-inner -->
        </div><!-- /#site-header-inner -->
    </header><!-- /#site-header -->
</div>
<!-- #site-header-wrap -->
