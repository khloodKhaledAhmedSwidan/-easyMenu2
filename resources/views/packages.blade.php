<html lang="en" itemscope="" itemtype="http://schema.org/Product" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta name="theme-color" content="#27323E">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> EASY MENU </title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles-mobile.css')}}">
    <!-- <link rel="stylesheet" href="../bonee-gallery.css">   -->
    <link rel="preload" href="styles.css" as="style">
    <link rel="preload" href="ui.js" as="script">

</head>

<body dir="rtl" class="body-mobile" style="overflow-x:hidden">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link href="{{asset('card.css')}}" rel="stylesheet">

<div class="social-box">
    <div class="container">
        <div class="row">
@foreach($packages as $package)
            <div class="col-lg-4 col-xs-12 text-center">
                <div class="box">
                    <i class=" fa-3x" aria-hidden="true"><img src="{{asset('img/easy.png')}}" style="width: 50px;height: 50px;"></i>
                    <div class="box-title">
                        <h3>{{$package->name_ar}}</h3>
                    </div>
                    <div class="box-text">
                      <ul>
                          <li>الوصف:{{$package->description_ar}}</li>
                          @if($package->id == 1)
                          <li>المدة:غير محدوده</li>
                              <li>السعر:مجانية</li>
                          @else
                              <li>المدة:{{$package->duration}}</li>
                              <li>السعر:{{$package->price}}</li>
                              @endif

                      </ul>

                    </div>
                    @if($package->id != 1)
                    <div class="box-btn">
                        <a href="{{route('choose_package',$package->id)}}">الاشتراك</a>
                    </div>
                        @endif
                </div>
            </div>
@endforeach






        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>

</html>
