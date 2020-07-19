@include('website.layouts.header')




<p style="height: 20px;"><br> </p>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('restaurants',$user)}}" class="external"><i class="fa fa-home "></i></a></li>
        <li><a href="{{route('cat-products',['user'=>$user,'id'=>$meal->category->id])}}" class="external">
                {{$meal->category->name_ar}}</a></li>
        <li><a href="#"> {{$meal->name_ar}}</a></li>
    </ul>
</div>

<!-- end home -->


<!-- product details -->
<div class="product-details segments">
    <div class="container">
        <!-- slider product details -->
        <div class="slider-p-details">
            <div data-pagination="{&quot;el&quot;: &quot;.swiper-pagination&quot;}" data-space-between="10"
                class="swiper-container swiper-init swiper-container-horizontal swiper-container-initialized swiper-container-rtl">
                <div class="swiper-pagination swiper-pagination-bullets"><span
                        class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span
                        class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span>
                </div>
                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                    <div class="swiper-slide swiper-slide-active" style="width: 1639px; margin-left: 10px;">
                        <div class="content">
                            <div class="mask"></div>
                            <img src="{{asset('uploads/meals/'.$meal->image)}}" alt="">
                        </div>
                    </div>

                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!-- end slider product details -->

        <!-- wrap content product details -->
        <div class="wrapper-content">

            <div class="freeship" style="margin-top: 10px;">
                <p><i class="fas fa-user-tag"></i>عرض خاص</p>
            </div>
            <div class="wrap-title-product wrap-c-margin">
                <h4 class="">{{$meal->name_ar}}</h4>
                <p class="price">
                    يبدأ من {{$meal->sizes()->orderBy('price','desc')->first()->price}}$
                </p>
            </div>

            <div class="wrap-info">
                <div class="list">
                    <ul>
                        <li>
                            <a href="#" class="item-link item-content sheet-open" data-sheet=".description-sheet">
                                <div class="item-inner item-cell">
                                    <div class="item-row">
                                        <div class="item-cell"> تفاصيل اضافية</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- description sheet modal -->
                <div class="sheet-modal description-sheet">
                    <div class="toolbar">
                        <div class="toolbar-inner">
                            <div class="left">التفاصيل</div>
                            <div class="right">
                                <a href="#" class="link sheet-close"><i class="fas fa-check"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sheet-modal-inner segments">
                        <div class="page-content">
                            <div class="container">

                                <div>

                                    <h4>تفاصيل الوجبة</h4>

                                    <p> {{$meal->content_ar}} </p>

                                    <div class="divider-space-text"></div>

                                    <h4>الاحجام المتاحه بالوجبة</h4>
                                    @foreach ($meal->sizes as $size)
                                    <p> {{$size->size_ar}}-({{$size->price}}) $ </p>
                                    @endforeach
                                    <div class="divider-space-text"></div>

                                    @if ($meal->additions->where('type',0)->count() > 0)
                                    <h4>الاضافات الاساسية المتاحه بالوجبة</h4>
                                    @foreach ($meal->additions->where('type',0) as $addition)
                                    <p> {{$addition->name_ar}}-({{$addition->price}}) $ </p>
                                    @endforeach
                                    <div class="divider-space-text"></div>
                                    @endif

                                    @if ($meal->additions->where('type',0)->count() > 1)
                                    <h4>الاضافات الجانبية المتاحه بالوجبة</h4>
                                    @foreach ($meal->additions->where('type',1) as $addition)
                                    <p> {{$addition->name_ar}}-({{$addition->price}}) $ </p>
                                    @endforeach
                                    <div class="divider-space-text"></div>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end description sheet modal -->



            </div>

        </div>
        <!-- end wrap content product details -->
    </div>




</div>
<!-- end product details -->

<!-- action product details -->
<div class="wrap-action-product-d">
    <div class="container">
        <div class="row">

            <div class="col-40">


                <div class="content-button">
                    <a href="{{route('choose-meal',['user'=>$user,'id'=>$meal->id])}}"
                        class="button primary-button external">
                        <i class="fas fa-cart-plus"></i> اطلب الان
                    </a>
                </div>

            </div>



        </div>
    </div>
</div>
<!-- end action product details -->
</div>
</div>
</div>

</div>

<script src="{{asset('js/framework7.bundle.min.js')}}"></script>
<script src="{{asset('js/routes.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<!-- Compiled and minified JavaScript -->




</body>

</html>
