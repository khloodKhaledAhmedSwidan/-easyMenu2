@include('website.layouts.header')
<style>
    @media only screen and (max-width: 736px) {
        .slider-main {
            display: none
        }
    }

</style>


<figure class="meal-img">
    <!--<a class="back" href=""><i class="fas fa-arrow-right"></i></a>-->
    <a class="back" href="{{url()->previous()}}"><i class="fas fa-arrow-right"></i></a>
    <img src="{{asset('uploads/meals/'.$meal->image)}}">
</figure>
@php
    $subscription = $user->subscriptions()->where('status',1)->first();
@endphp
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
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-10">
            <div class="caption">
                <h4 class="titleinner">{{app()->getLocale()=='ar'?$meal->name_ar:$meal->name}}</h4>
                <p class="descinner">{{app()->getLocale()=='ar'?$meal->content_ar:$meal->content}}</p>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="price float-left">
                <p>{{$meal->price}} SR</p>
            </div>
        </div>
    </div>
</div>

<!--
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('restaurants',$user)}}" class="external"><i class="fa fa-home"></i></a></li>
        <li><a href="{{route('cat-products',['user'=>$user,'id'=>$meal->category->id])}}" class="external">
                {{$meal->category->name_ar}}</a></li>
        <li><a href="#"> طلب الوجبة </a></li>
    </ul>
</div>
-->

<div class="container">
  <div class="section-title">
      <ul class="breadcrumb">
          <!--<li class="breadcrumb-item"><a href="{{route('restaurants',$user)}}"><i class="fa fa-home"></i></a></li>-->
          <li class="breadcrumb-item"><a href="{{route('restaurants',$user)}}"><i class="fa fa-home"> الأقسام </i></a></li>
          <li class="breadcrumb-item active">
          <a href="{{route('cat-products',['user'=>$user,'id'=>$cat->id])}}">
          {{$cat->name_ar }}
          </a>
          </li>
          <li class="breadcrumb-item active">{{$meal->first() ? $meal->name_ar : ''}}</li>
      </ul>
  </div>
    <form class="list modal-content cart-form" method="post" action="{{route('add-to-cart',$meal->id)}}">
        @csrf
        <input type="hidden" name="meal_id" value="{{$meal->id}}">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="hidden" name="totalFromPopUp" id="totalFromPopUp-{{$meal->id}}" value="{{$meal->price}}">

        <div class="row content-dec">

            @if($meal->sizes()->count() > 0)
                <div class="col-lg-12">
                    <div class="wrap-title">
                        <h6>
                            {{app()->getLocale() == 'ar' ? 'الحجم' :'Size'}}
                        </h6>
                    </div>
                    <div class="row">

                    <div class="col-12 col-md-12">
                        <div class="form-check">
                            <div class="form-check-label">
                                <label class="radio">
                                    <input type="radio" class="form-input" onchange="sizeOp({{$meal->id}},0,{{$meal->price}})"  name="size_id" value="0" id="size-{{$meal->id}}-{{0}}" data-price="0">
                                    <span class="checkmark"></span>
                                    {{app()->getLocale() == 'ar' ? 'بدون احجام' : 'default size'}}-{{(0)}}
                                </label>
                            </div>
                        </div>
                    </div>

                        @foreach ($meal->sizes as $item)

                            <div class="col-12 col-md-12">
                                <div class="form-check">
                                    <div class="form-check-label">
                                        <label class="radio">
                                            <input type="radio" class="form-input" onchange="sizeOp({{$meal->id}},{{$item->id}},{{$meal->price}})" name="size_id" value="{{$item->id}}" id="size-{{$meal->id}}-{{$item->id}}" data-price="{{$item->price}}">
                                            <span class="checkmark"></span>
                                            {{app()->getLocale() == 'ar' ? $item->size_ar : $item->size}}-{{($item->price )}}
                                        </label>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            @endif

            @if($meal->additions->where('type',0)->count() > 0)
                <div class="col-lg-12">
                    <div class="wrap-title">
                        <h6>
                            {{app()->getLocale() == 'ar' ? 'الأضافات الأساسية' :'Main Additions'}}
                        </h6>
                    </div>
                    @foreach ($meal->additions->where('type',0) as
                    $addition)

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="main_additions[]" id="e-{{$meal->id}}-{{$addition->id}}" checked value="{{ $addition->id}}" multiple>
                                {{ app()->getLocale() == 'ar'? $addition->name_ar : $addition->name}}
                                <span class="checkmark"></span>
                            </label>
                        </div>

                    @endforeach
                </div>
            @endif

            @if($meal->additions->where('type',1)->count() > 0)
                <div class="col-lg-12">
                    <div class="wrap-title">
                        <h6>
                            {{app()->getLocale() == 'ar' ? 'الأضافات الجانبية' :'More Additions'}}
                        </h6>
                    </div>

                    @foreach ($meal->additions->where('type',1) as
                    $addition)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" id="sub_add{{$meal->id}}-{{$addition->id}}" name="more_additions[]" value="{{ $addition->id}}" data-price="{{$addition->price}}" multiple onclick="test({{$meal->id}},{{$addition->id}})">
                                {{ app()->getLocale() == 'ar'? $addition->name_ar.' - '.$addition->price : $addition->name.' - '.$addition->price}}
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="col-lg-12">
                <div class="orderdesc">

                    <div class="col-lg-5dd">


                        <div class="number-goods">
                            <div class="stepper stepper-small stepper-init">
                                <div onclick="reduce({{$meal->id}},{{$meal->price}})" class="stepper-button-minus"><i class="fas fa-minus"></i></div>
                                <div class="stepper-input-wrap">
                                    <input value="1" id="quantity-{{$meal->id}}" class="form-control" type="text"  name="quantity">

                                </div>
                                <div class="stepper-button-plus" onclick="add({{$meal->id}},{{$meal->price}})"><i class="fas fa-plus"></i></div>
                            </div>
                        </div>

                    </div>



                    <div class="col-md-6dd" style="display: flex;">
                        <div class="wrap-titlec">

                            @lang('messages.total')

                        </div>


                        <input type="text" class="pricefin" id="sizePrice-{{$meal->id}}" readonly value="0">
                    </div>

                </div>
            </div>
        </div>
        {{-- {{dd($user->subscriptions()->where('status',1)->where('finished',0)->first()->id )}} --}}
        @if ($subscription == null ? false : $subscription->package_id == 1 ? false: true )
<div class="d text-center dd">
    <button type="submit" class="button primary-button">
        <i class="fas fa-shopping-bag"></i>
        {{ trans('messages.add-to-cart') }}
    </button>
</div>
@endif

    </form>
</div>


<!-- action product details -->

</div>
</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/routes.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>



<script>
    function start(id, price) {
        // $('#exampleModal-' + id + '').on('show.bs.modal', function() {

        // });
    }

    $(document).ready(function() {
        var sizePrice = {{ $meal-> price }};
        var id = {{ $meal-> id }};

        var sizeQuan = Number.parseInt($('#quantity-' + id + '').val());
        var check = sizePrice * sizeQuan;
        var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";
        $("#sizePrice-" + id + "").val(result);
        $("#totalFromPopUp-" + id + "").val(check);
    });



    {{--function sizeOp(meal_id, size_id, price) {--}}


    {{--    var oldValue = Number.parseInt($("#sizePrice-" + meal_id + "").val());--}}
    {{--    console.log("oldValue" + oldValue);--}}
    {{--    var sizePrice = $("input:radio[name=size_id]:checked").data('price');--}}
    {{--    console.log("sizePrice" + sizePrice);--}}
    {{--    var sizeQuan = Number.parseInt($('#quantity-' + meal_id + '').val());--}}
    {{--    console.log("sizeQuan" + sizeQuan);--}}
    {{--    var addPrices = [];--}}

    {{--    $("input[name='more_additions[]']:checked").each(function () {--}}
    {{--        addPrices.push($(this).data('price'));--}}
    {{--    });--}}

    {{--    var totalAddPrices = addPrices.reduce(function (a, b) {--}}
    {{--        return a + b;--}}
    {{--    }, 0);--}}
    {{--    console.log(" totalAddPrices" +  totalAddPrices);--}}

    {{--        var check = price + ((sizePrice + totalAddPrices) * sizeQuan);--}}
    {{--        console.log("check"+check);--}}
    {{--        var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";--}}

    {{--        $("#sizePrice-" + meal_id + "").val(result);--}}
    {{--        $("#totalFromPopUp-" + meal_id + "").val(check);--}}


    {{--}--}}




    function sizeOp(meal_id, size_id, price) {

        var oldValue = Number.parseInt($("#sizePrice-" + meal_id + "").val());
        console.log("oldValue" + oldValue);
        var sizePrice = $("input:radio[name=size_id]:checked").data('price');
        console.log("sizePrice" + sizePrice);
        var sizeQuan = Number.parseInt($('#quantity-' + meal_id + '').val());
        console.log("sizeQuan" + sizeQuan);
        var addPrices = [];
        {{--if (sizePrice == 0) {--}}
        {{--    console.log("here");--}}
        {{--    $("input[name='more_additions[]']:checked").each(function () {--}}
        {{--        addPrices.push($(this).data('price'));--}}
        {{--    });--}}
        {{--    console.log("addPrices" + addPrices);--}}
        {{--    var totalAddPrices = addPrices.reduce(function (a, b) {--}}
        {{--        return a + b;--}}
        {{--    }, 0);--}}

        {{--    console.log("totalAddPrices" + totalAddPrices);--}}
        {{--    var check = price + ((sizePrice + totalAddPrices) * sizeQuan);--}}


        {{--    var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";--}}

        {{--    $("#sizePrice-" + meal_id + "").val(result);--}}
        {{--    $("#totalFromPopUp-" + meal_id + "").val(check);--}}
        {{--} else {--}}

        $("input[name='more_additions[]']:checked").each(function () {
            addPrices.push($(this).data('price'));
        });

        var totalAddPrices = addPrices.reduce(function (a, b) {
            return a + b;
        }, 0);
        console.log(" totalAddPrices" +  totalAddPrices);


    var sizePlusTotal = sizePrice+ totalAddPrices;

        if(sizePlusTotal == 0 ) {
            var check = price  * sizeQuan;
            console.log("check"+check);
            var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";

            $("#sizePrice-" + meal_id + "").val(result);
            $("#totalFromPopUp-" + meal_id + "").val(check);
        }else{
        var check = (price + (sizePrice + totalAddPrices) * sizeQuan);

            console.log("check"+check);
            var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";

            $("#sizePrice-" + meal_id + "").val(result);
            $("#totalFromPopUp-" + meal_id + "").val(check);
        }
        {{--var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";--}}

        {{--$("#sizePrice-" + meal_id + "").val(result);--}}
        {{--$("#totalFromPopUp-" + meal_id + "").val(check);--}}
        // }

    }



    function test(meal_id, addition_id) {
        var tes = $("#sub_add" + meal_id + "-" + addition_id + "").prop('checked');
        var oldValue = Number.parseInt($("#sizePrice-" + meal_id + "").val());

        if (tes) {
            var addPrice = $("#sub_add" + meal_id + "-" + addition_id + "").data('price');
            var addQuan = Number.parseInt($('#quantity-' + meal_id + '').val());
            var check = oldValue + (addPrice * addQuan);
            var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";
            $("#sizePrice-" + meal_id + "").val(result);
            $("#totalFromPopUp-" + meal_id + "").val(check);

        } else {
            var addPrice = $("#sub_add" + meal_id + "-" + addition_id + "").data('price');
            var addQuan = Number.parseInt($('#quantity-' + meal_id + '').val());
            var check = oldValue - (addPrice * addQuan);
            if (check > 0) {
                var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";
                $("#sizePrice-" + meal_id + "").val(result);
                $("#totalFromPopUp-" + meal_id + "").val(check);
            } else {
                var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";
                $("#sizePrice-" + meal_id + "").val(0);
                $("#totalFromPopUp-" + meal_id + "").val(0);
            }

        }
    }

    function add(id, price) {

        var number = Number.parseInt($('#quantity-' + id + '').val());
        var n = number + 1;
        $("#quantity-" + id + "").val(n);
        var oldValue = Number.parseInt($("#sizePrice-" + id + "").val());
        var sizePrice = $("input:radio[name=size_id]:checked").data('price');
        sizePrice = sizePrice == undefined ? 0 : sizePrice;
        // console.log(sizePrice);
        var addPrices = [];
        $("input[name='more_additions[]']:checked").each(function() {
            addPrices.push($(this).data('price'));
        });
        var totalAddPrices = addPrices.reduce(function(a, b) {
            return a + b;
        }, 0);

        var sizeQuan = Number.parseInt($('#quantity-' + id + '').val());
        var check = Number.isNaN((sizePrice + totalAddPrices + price) * sizeQuan) ? 0 : (sizePrice + totalAddPrices + price) * sizeQuan;
        var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";
        $("#sizePrice-" + id + "").val(result);
        $("#totalFromPopUp-" + id + "").val(check);
    }

    function reduce(id, price) {
        var number = Number.parseInt($('#quantity-' + id + '').val());
        var n = number - 1 <= 1 ? 1 : number - 1;
        $("#quantity-" + id + "").val(n);
        var oldValue = Number.parseInt($("#sizePrice-" + id + "").val());
        var sizePrice = $("input:radio[name=size_id]:checked").data('price');
        sizePrice = sizePrice == undefined ? 0 : sizePrice;
        var addPrices = [];
        $("input[name='more_additions[]']:checked").each(function() {
            addPrices.push($(this).data('price'));
        });
        var totalAddPrices = addPrices.reduce(function(a, b) {
            return a + b;
        }, 0);

        var sizeQuan = Number.parseInt($('#quantity-' + id + '').val());
        // var result = Number.isNaN(sizePrice * sizeQuan) ? 0 : sizePrice * sizeQuan;
        var check = Number.isNaN((sizePrice + totalAddPrices + price) * sizeQuan) ? 0 : (sizePrice + totalAddPrices + price) * sizeQuan;
        var result = check + "{{app()->getLocale() == 'ar' ? ' ر.س ' : ' SAR '}}";
        $("#sizePrice-" + id + "").val(result);
        $("#totalFromPopUp-" + id + "").val(check);
    }





    // function test(meal_id,addition_id){
    //     var tes =$("#sub_add"+meal_id+"-"+addition_id+"").prop('checked');
    //     var oldValue = Number.parseInt($("#sizePrice-"+meal_id+"").val());

    //     if(tes){
    //         var addPrice = $("#sub_add"+meal_id+"-"+addition_id+"").data('price');
    //         var addQuan = Number.parseInt($('#quantity-'+meal_id+'').val());
    //         var result = oldValue + (addPrice*addQuan);
    //         $("#sizePrice-"+meal_id+"").val(result);


    //     }else{
    //         var addPrice = $("#sub_add"+meal_id+"-"+addition_id+"").data('price');
    //         var addQuan = Number.parseInt($('#quantity-'+meal_id+'').val());
    //         var result = oldValue - (addPrice*addQuan);
    //         if(result > 0){
    //             $("#sizePrice-"+meal_id+"").val(result);
    //         }else{
    //             $("#sizePrice-"+meal_id+"").val(0);
    //         }

    //     }
    // }

    // function add(id){

    //     var number = Number.parseInt($('#quantity-'+id+'').val());
    //     var n = number+1;
    //     $("#quantity-"+id+"").val(n);
    //     var oldValue = Number.parseInt($("#sizePrice-"+id+"").val());
    //     var sizePrice = $("input:radio[name=size_id]:checked").data('price');
    //     sizePrice = sizePrice == undefined ? 0 : sizePrice ;
    //     // console.log(sizePrice);
    //     var addPrices = [];
    //     $("input[name='more_additions[]']:checked").each(function () {
    //         addPrices.push($(this).data('price'));
    //     });
    //     var totalAddPrices = addPrices.reduce(function(a, b){
    //         return a + b;
    //     }, 0);

    //     var sizeQuan = Number.parseInt($('#quantity-'+id+'').val());
    //     var result = Number.isNaN((sizePrice + totalAddPrices) * sizeQuan) ? 0 : (sizePrice + totalAddPrices) * sizeQuan;
    //     $("#sizePrice-"+id+"").val(result);
    // }

    // function reduce(id){
    //     var number = Number.parseInt($('#quantity-'+id+'').val());
    //     var n = number-1 <= 1 ? 1 : number-1;
    //     $("#quantity-"+id+"").val(n);
    //     var oldValue = Number.parseInt($("#sizePrice-"+id+"").val());
    //     var sizePrice = $("input:radio[name=size_id]:checked").data('price');
    //     sizePrice = sizePrice == undefined ? 0 : sizePrice ;
    //     var addPrices = [];
    //     $("input[name='more_additions[]']:checked").each(function () {
    //         addPrices.push($(this).data('price'));
    //     });
    //     var totalAddPrices = addPrices.reduce(function(a, b){
    //         return a + b;
    //     }, 0);

    //     var sizeQuan = Number.parseInt($('#quantity-'+id+'').val());
    //     // var result = Number.isNaN(sizePrice * sizeQuan) ? 0 : sizePrice * sizeQuan;
    //     var result = Number.isNaN((sizePrice + totalAddPrices) * sizeQuan) ? 0 : (sizePrice + totalAddPrices) * sizeQuan;
    //     $("#sizePrice-"+id+"").val(result);
    // }

    function showTab(id) {
        $(document).on('click', '.testToggle', function() {
            $(".testToggle").removeClass("active");
            $(".testToggle2").removeClass("active");
            $("#tab-" + id + "").addClass('active');
        });
        // $("#tab-"+id+"").addClass('active');

    }

</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<!-- Compiled and minified JavaScript -->




</body>

</html>
