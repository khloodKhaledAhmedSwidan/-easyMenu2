@include('website.layouts.header')
{{--<div class="bar dl-none">--}}
{{--    <div class="d-flex">--}}
{{--        <figure><img src="http://easymenu.site/uploads/categories/categories_1592409595.jpg" alt=""></figure>--}}
{{--        <h3>{{$user->name_ar}} <span class="mr-3">--}}
{{--                <i class="fas fa-star"></i> 4.0--}}
{{--            </span></h3>--}}
{{--    </div>--}}
{{--    <p class="desc">{{$user->description}}</p>--}}
{{--    <div class="row">--}}
{{--        <div class="col">--}}
{{--            <p><strong>{{$user->minimum}} ريال</strong></p>--}}
{{--            <p>حد أدني</p>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <p><strong>{{$user->delivery_price}} ريال</strong></p>--}}
{{--            <p>التوصيل</p>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <p><strong>{{$user->delivery_from}}-{{$user->delivery_to}} دقائق</strong></p>--}}
{{--            <p>مدة التوصيل</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- recommended -->
<div class="recommended  product products segments-bottom">
    @include('flash::message')
    <div class="container">
        <div class="section-title">
            <ul class="breadcrumb">
                <!--<li class="breadcrumb-item"><a href="{{route('restaurants',$user)}}"><i class="fa fa-home"></i></a></li>-->
                <li class="breadcrumb-item"><a href="{{route('restaurants',$user)}}"><i class="fa fa-home"> الأقسام </i></a></li> 
                <li class="breadcrumb-item active">
 
             {{$category->name_ar}}  
 
                </li>
            </ul>
        </div>

        <div class="row">
            @forelse ($products as $meal)
            <div class="col-12">
                <div class="content content-shadow-product">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="caption">
                                <a class="img-poroduct" href="{{route('choose-meal',['user'=>$user,'id'=>$meal->id])}}">
                                    <img src="{{asset('uploads/meals/'.$meal->image)}}" height="120px" style="max-width:99%;" alt="product">
                                </a>
                                <div class="title-product">
                                    <div class="dd-flex">
                                        <a href="{{route('choose-meal',['user'=>$user,'id'=>$meal->id])}}">
                                            {{$meal->name_ar}}
                                        </a>
                                        <div class="meal-price dl-none">
                                            <img src="{{asset('uploads/price-svg.png')}}">
                                            {{$meal->price}}
                                            ر.س
                                        </div>
                                    </div>
                                    <p>{{$meal->content_ar}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 dm-none">
                            <div class="float-left">
                                <ul class="list-unstyled">
                                    <li class="meal-price">
                                        <img src="{{asset('uploads/price-svg.png')}}">
                                        {{$meal->price}}
                                        ر.س
                                    </li>
                                    <!--
                                    <li class="meal-calories">
                                        <img src="{{asset('uploads/food-svg.png')}}"> {{$meal->calories}}
                                        سعرة
                                    </li>
-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <strong>no data found</strong>
                </div>
            </div>
            @endforelse

        </div>
    </div>
    <!-- end recommended -->

    <!-- end home -->
</div>


</div>
</div>
</div>
<style>
    @media only screen and (max-width: 736px) {
        .slider-main .logo {
            bottom: 50px;
        }
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/routes.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script>
    $(window).scroll(function() {
        if ($(window).width() < 768) {
            if ($(this).scrollTop() > 250) {
                $(".section-title").addClass("fixed");
            } else {
                $(".section-title").removeClass("fixed");
            }


        }
    });

</script>


</body>

</html>
