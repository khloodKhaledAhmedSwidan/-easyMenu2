<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <title>ESEY MENU</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!--    <link rel="stylesheet" href="{{asset('css/framework7.bundle.css')}}">-->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}"> --}}

    <style>
        #map {
            height: 300px;
            width: 100%;
        }
    </style>


</head>

<body>

    <div id="app" dir="rtl">

        <div class="row flex-row-reverse m-0">

            <div class="col-lg-6 p-0 slide-area">
                <div class="fixed-site">
                    <div class="navbar">
                        <div class="row">
                            <div class="col-6">
                                @php
                                    $subscription = $user->subscriptions()->where('status',1)->first();
                                @endphp
                                {{-- {{dd($subscription)}} --}}
                                @if ($subscription == null ? false : $subscription->package_id == 1 ? false: true )
                                <a href="{{route('get-cart',$user)}}" class="external">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>
                                        [   
                                        @php
                                        $cart = session()->get('cart');
                                        if(isset($cart)){
                                        $count = count($cart->items);
                                        }else{
                                        $count = 0;
                                        }
                                        @endphp {{ $count}} 
                                        ]
                                    </span>
                                </a>
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="float-left">
                                    <a href="#">
                                        <i class="fas fa-share-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slider-main">
                        <img src="{{asset('uploads/users/'.$user->image)}}" class="logo" />
                        <div class="slider owl-carousel" id="home-slider" dir="ltr">
                            @foreach ($user->sliders as $slider)
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"
                                    style="background-image:url({{asset('uploads/sliders/'.$slider->image)}})">
                                    <div class="content">

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 p-0 right-area">