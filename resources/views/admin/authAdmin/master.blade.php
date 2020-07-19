<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="{{ URL::asset('admin/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/simple-line-icons/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-switch-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/components-rounded-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/plugins-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/layout-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/darkblue-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/custom-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/login-rtl.min.css') }}">

    {{--<link rel="shortcut icon" href="favicon.ico" />--}}
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body class=" login">
    <div class="logo">
        <a href="#">
            <img src="{{asset('/images/easy.png')}}" alt="" style="max-width:100px;" />
        </a>
    </div>
    <div class="content">

        @yield('content')

    </div>

    <div class="copyright"> {{ date('Y') }} © تطوير بواسطة
        <a href="#"> شركة تقني. </a>
    </div>

</body>

</html>
