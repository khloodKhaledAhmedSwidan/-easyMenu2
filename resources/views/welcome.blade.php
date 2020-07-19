@include('website.layouts.header')
<div class="bar dl-none">
    <div class="d-flex">
        <figure><img src="http://easymenu.site/uploads/categories/categories_1592409595.jpg" alt=""></figure>
        <h3>{{$user->name_ar}} <span class="mr-3">
{{--                <i class="fas fa-star"></i> 4.0--}}
            </span></h3>
    </div>
    <p class="desc">{{$user->description}}</p>
    <div class="row">
        <div class="col">
            <p><strong>{{$user->minimum}} ريال</strong></p>
            <p>حد أدني</p>
        </div>
        <div class="col">
            <p><strong>{{$user->delivery_price}} ريال</strong></p>
            <p>التوصيل</p>
        </div>
        <div class="col">
            <p><strong>{{$user->delivery_from}}-{{$user->delivery_to}} دقائق</strong></p>
            <p>مدة التوصيل</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-10 text-center" style="margin:auto;">
            @include('flash::message')
        </div>
    </div>
</div>


<!-- cateogries -->
<div class="segments">
    <div class="">
        <div class="section-title">
            <h3>الأقسام</h3>
        </div>
        <div class="categories">
            <div class="container">
                <div class="row">

                    @foreach ($user->categories as $item)
                    <div class="col-lg-4 col-6">
                        <div class="content">
                            <a class="external" href="{{route('cat-products',['id'=>$item->id,'user'=>$user])}}">
                                <div class="icon">
                                    <img src="{{asset('uploads/categories/'.$item->image)}}" alt="" />
                                </div>
                                <span>{{$item->name_ar}}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cateogries -->

<!-- end home -->
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
