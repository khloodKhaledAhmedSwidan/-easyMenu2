@include('website.layouts.header')



<div class="container">
    <ul class="breadcrumb mt-4">
        <li class="breadcrumb-item"><a href="{{route('restaurants',$user)}}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active">السلة</li>
    </ul>
</div>


<!-- Start Section
==========================================-->
<section class="items">
    <div class="container">
        <div class="row">
            <input type="hidden" name="_token" value="Ft6dhApKyJMDkpT4SqD9jrqJQR19CK8hJIoHqVeV">
            <div class="col-lg-12">
                <div class="cart-content-wrap">



                    <div class="StyledComponents__Items-SRFJe hcASoE">
                        <div class="OrderElement__Wrapper-isbagB jetVkS">


                            {{-- @php
        dd($cart);
        @endphp --}}

                            @isset($products)
                            @foreach ($products as $item)
                            {{-- {{dd($item)}} --}}
                            <div class="OrderElement__Wrapper-isbagB iErSvt">
                                <div class="OrderElement__Row-LZmuf iErSvt">
                                    <div class="OrderElement__Quantity-gqMKEl gRzMLS">
                                        {{$cart->items[$item->id]['quantity']}}x</div>
                                    <div class="OrderElement__Column-fEpbSI cywOjU">
                                        <div class="OrderElement__TitleWrapper-izXbfJ fnSNNQ">
                                            <div class="OrderElement__Title-ebBmSk hFNJuX">{{ $item->name_ar}}</div>
                                            {{-- <div class="OrderElement__IconEdit-krTaEu iMQsUQ">
                            <div class="IconWrapper-iBIgKa hdwFdO">
                                <img class="StyledIcon-gTfjEw ikcOnc" src="{{asset('uploads/edit.svg')}}" alt="edit">
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="OrderElement__Description-dyARtJ lfuZlb">
                                    @isset($cart->items[$item->id]['more_additions'])
                                    @foreach ($cart->items[$item->id]['more_additions'] as $key => $addition_id)
                                    @php
                                    $add = App\Addition::find($addition_id);
                                    @endphp
                                    {{$add->name_ar. ','}}
                                    @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>

                        <div class="OrderElement__Row-LZmuf bFyCxF" style="flex-shrink: 0;">
                            <div class="OrderElement__Price-eHUmcD kSJTLs">SR {{$item->price}}</div>
                            <a href="{{route('cart.remove',$item->id)}}" class="IconWrapper-iBIgKa hdwFdO external"><img class="StyledIcon-gTfjEw iPKoZT" src="{{asset('uploads/del.svg')}}" alt="trash-red" size="20">
                            </a>
                        </div>
                    </div>



                    @endforeach
                    @endisset

                </div>


            </div>

            <!--  <table class=" table table-cart table-border">
                        <thead>
                            <tr>
                                <th class="product-name">@lang('messages.name')</th>
                                <th class="product-price">@lang('messages.price')</th>
                                <th class="product-quantity">@lang('messages.quantity')</th>
                                <th class="product-quantity">@lang('messages.additions')</th>
                                <th class="product-subtotal">@lang('messages.total')</th>
                                <th class="product-subtotal">@lang('messages.delete')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalCartPrice = 0;
                            @endphp
                            @isset($products)
                            @foreach ($products as $item)
                            {{-- {{dd($cart)}} --}}
                            <tr>
                                <th class="product-name">
                                    {{app()->getLocale() == 'ar' ? $item->name_ar : $item->name}}
                                </th>
                                <th class="product-price">{{$cart->items[$item->id]['price']}}</th>
                                <th class="product-quantity">{{$cart->items[$item->id]['quantity']}}</th>
                                <th class="product-quantity">
                                    @php
                                    $price = [];
                                    // array_push($price,$cart->items[$item->id]['price']);
                                    @endphp
                                    @isset($cart->items[$item->id]['more_additions'])
                                    @foreach ($cart->items[$item->id]['more_additions'] as $key => $addition_id)
                                    @php
                                    $add = App\Addition::find($addition_id);
                                    $add_price = $add->price;
                                    array_push($price,$add_price);
                                    // dd($cart->items[$item->id]['more_additions']);
                                    @endphp
                                    @if (app()->getLocale() == 'ar')
                                    {{$add->name_ar. ','. ($add->price)}}<br>
                                    @else
                                    {{$add->name. ','. ($add->price)}}<br>
                                    @endif
                                    @endforeach
                                    @endisset
                                </th>
                                <th class="product-subtotal">
                                    @php
                                    $total = array_sum($price) * $cart->items[$item->id]['quantity'];
                                    @endphp
                                    {{$total + $cart->items[$item->id]['quantity'] * $cart->items[$item->id]['price']}}
                                    @php
                                    $totalCartPrice += $total * $cart->items[$item->id]['quantity'];
                                    @endphp
                                </th>
                                <th class="product-subtotal">
                                    <a href="{{route('cart.remove',$item->id)}}" class="external">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>

                    </table>-->
            @isset($cart)



            <!--<div class="StyledComponents__Unshrinkable-isMUjP dtGGjY">-->
            <!--    <div class="Amount__Wrapper-dterOW dEARJd"><span>قيمة الطلب</span>-->

            <!--        <span class="Amount__Quantity-gXjznF hLVzDN"> SR {{$priceBeforeVat}}</span>-->
            <!--    </div>-->

            <!--    <div class="Amount__Wrapper-dterOW dEARJd"><span>المجموع </span>-->
            <!--        <span class="Amount__Quantity-gXjznF kWbUqE">{{$totalPrice}}SR</span>-->
            <!--        {{-- <span id="total-price"></span> --}}-->
            <!--    </div>-->

            <!--</div>-->

            @php
                // dd($table_id);
            @endphp

            <div class="StyledComponents__Unshrinkable-isMUjP dtGGjY">

                <div class="Amount__Wrapper-dterOW dEARJd"><span>قيمة الطلب</span>
                    <span class="Amount__Quantity-gXjznF hLVzDN"> SR {{$priceBeforeVat}}</span>
                </div>

                <div class="Amount__Wrapper-dterOW dEARJd"><span>  قيمة الضريبة  %{{$vatPercentage}}</span>
                    <span class="Amount__Quantity-gXjznF hLVzDN"> SR {{$vatAddition}}</span>
                </div>
                <input type="hidden" id="del" value="{{$deliveryPrice}}">

                <div class="Amount__Wrapper-dterOW dEARJd"><span> قيمة الطلب بعد الضريبة</span>
                    <span class="Amount__Quantity-gXjznF hLVzDN"> SR {{$priceAfterVat}}</span>
                </div>
@if($table_id != null)

                @else
                    <div class="prependedcheckbox1" id="saturday">
                        <div class="Amount__Wrapper-dterOW dEARJd " ><span> قيمة التوصيل</span>
                            <span class="Amount__Quantity-gXjznF hLVzDN"> SR {{$deliveryPrice}}</span>
                        </div>
                    </div>
     @endif

                <div class="Amount__Wrapper-dterOW dEARJd"><span>المجموع </span>
                    <span class="Amount__Quantity-gXjznF kWbUqE" id="total">
                        @if($table_id != null)
                        {{$totalPrice - $deliveryPrice}}
                        @else
                            {{$totalPrice}}
                        @endif
                    </span>
                    {{-- <span  id="total-price"></span> --}}
                </div>

            </div>

            <form action="{{route('post-order')}}" method="POST">
                @csrf
                <div class="table-footer">
                    @if ($table_id == null)
                    <div class="total">

                        <div class="wrap-title">
                            <h6>
                                <i class="fas fa-shipping-fast"></i> @lang('messages.delivery-method') :
                            </h6>
                        </div>



                        @if ($user->delivery == 1)



                        <div class="form-check">
                        <label class="form-check-label">
                                    <label class="radio">
                                        <input type="radio" id="checkbox2"  name="delivery_status"  value="0" checked="checked">
                                        <span class="checkmark"></span>
                                        {{-- @lang('messages.delivery') --}}
                                        توصيل 
                                    </label>
                                </div>

                        @error('delivery_status')
                        <span class="help-block">
                            <strong style="color: red;">
                                {{ $errors->first('delivery_status') }}
                            </strong>
                        </span>
                        @enderror
                        @endif

                        <div class="form-check">
                        <label class="form-check-label">
                                    <label class="radio">
                                        <input type="radio" id="checkbox1" name="delivery_status"  value="1" >
                                        <span class="checkmark"></span>
                                        {{-- @lang('messages.branch-del') --}}
                                        استلام من الفرع
                                    </label>
                                </div>



                    </div>
                    @endif








                    <!--     <div class="total">
                                <span>@lang('messages.total-before-vat') : </span>
                                {{$priceBeforeVat}}
                                @lang('messages.S.R')
                            </div>

                            <div class="total">
                                <span>@lang('messages.vat') : </span>
                                {{( $priceBeforeVat *  ($user->vat == null ? 0 : ($user->vat/100)))}}
                                @lang('messages.S.R')
                            </div>

                            <div class="total">
                                <span>@lang('messages.total-after-vat') : </span>
                                {{$cart->totalPrice }} @lang('messages.S.R')
                            </div>
                            @if ($user->delivery == 1)
                            <div class="total hideThis" id="delivery_price" style="width: 100%">
                                <span>@lang('messages.del-price') : </span>

                                {{$user->delivery_price + ($user->delivery_price *($user->vat == null ? 0 : ($user->vat/100)))}}
                                @lang('messages.S.R')
                            </div>
                            @endif
                            {{-- {{dd($cart)}} --}}
                            <div class="total" style="width: 100%">
                                <span> @lang('messages.total-price') : </span>
                                <span id="total-price" style="color: black;"> {{$cart->totalPrice}} </span>
                                @lang('messages.S.R')
                            </div>


                            -->
                    <input type="hidden" name="totalPrice" id="total-total" value="{{$cart->totalPrice - $user->delivery_price}}">
                    <input type="hidden" name="totalPriceBeforeVat" id="total-total" value="{{$cart->totalPrice -  ($cart->totalPrice * ($user->vat == null ? 0 : ($user->vat/100)))}}">
                    <input type="hidden" name="deliveryPrice" id="delivery-price" value="{{$user->delivery_price + ($user->delivery_price *($user->vat == null ? 0 : ($user->vat/100)))}}">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="hidden" name="totalAfterAll" id="lastTotalAfterAll" value="0">
                    <input type="hidden" name="vatPrice" id="vatPrice" value="{{($cart->totalPrice *($user->vat == null ? 0 : ($user->vat/100)))}}">
                    <span><i class="error-data" style="color: rgb(209, 5, 8); display: inline-block; font-size: 14px;"></i></span>
                    <div class="w-100"></div>




                    <div class="form-group">
                        <label for="name">ادخل الاسم</label>
                        <input type="text" name="name" id="name" placeholder="الاسم هنا" class="form-control" required value="{{old('name')}}">
                        @error('name')
                        <span class="help-block">
                            <strong style="color: red;">
                                {{ $errors->first('name') }}
                            </strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">ادخل الهاتف</label>
                        <input type="text" name="phone" id="phone" placeholder="9660000000" class="form-control" required value="{{old('phone')}}">
                        @error('phone')
                        <span class="help-block">
                            <strong style="color: red;">
                                {{ $errors->first('phone') }}
                            </strong>
                        </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                                <label for="adderss">ادخل العنوان</label>
                                <input type="text" name="adderss" id="adderss" placeholder="الرياض طريق الملك فهد"
                                    class="form-control" value="{{old('address')}}">
                    @error('adderss')
                    <span class="help-block">
                        <strong style="color: red;">
                            {{ $errors->first('adderss') }}
                        </strong>
                    </span>
                    @enderror
                </div> --}}

                {{-- {{dd($table_id)}} --}}

                <div id="hide-city">
                    @if ($table_id == null)
                    <div class="form-group">
                      <label for="name">اختار المدينة</label>
                    <div class="total" id="city-selection">
                        {{-- <span> @lang('messages.choose-city') : </span> --}}
                        <select class="form-control" name="city_id" required>
                            <option selected disabled>@lang('messages.choose-city')</option>

                            @foreach ($user->cities as $city)
                            <option value="{{$city->id}}"  > {{$city->name}} </option>
                                {{app()->getLocale() == 'ar'?$city->address_ar:$city->address}}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                        <span class="help-block">
                            <strong style="color: red;">
                                {{ $errors->first('city_id') }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                  </div>

                    <div class="form-group">
                        <label for="name">اختار الفرع</label>
                        <div class="total" id="branch-selection">
                            {{-- <span> @lang('messages.choose-branch') : </span> --}}
                            <select class="form-control" name="branch_id" required>
                                <option selected disabled>@lang('messages.choose-branch')</option>
                            </select>
                            @error('branch_id')
                            <span class="help-block">
                                <strong style="color: red;">
                                    {{ $errors->first('branch_id') }}
                                </strong>
                            </span>
                            @enderror
                        </div>

                  </div>
                        <br>
                        <br>
                        <br>
                        <br>
                  @endif
                </div>

                {{-- {{dd($table_id)}} --}}

                <div class="col-m-12 " id="hide-map">
                    @if($table_id == null)
                    <div class="content sections">

                        <div class="wrap-title d-flex justify-content-between mm">
                            <h6>
                                <i class="fas fa-map-marker-alt"></i> حدد موقعك
                            </h6>
                            <a onclick="getLocation();" class="button secondary-button"> <i class="fa fa-location-arrow"></i>حدد
                            موقعي</a>
                        </div>

                        <input type="text" id="lat" name="latitude" class="form-control mb-2" readonly="yes" required />
                        @if ($errors->has('latitude'))
                        <span class="help-block">
                            <strong style="color: red;">{{ $errors->first('latitude') }}</strong>
                        </span>
                        @endif
                        <input type="text" id="lng" name="longitude" class="form-control mb-2" readonly="yes" required />
                        @if ($errors->has('longitude'))
                        <span class="help-block">
                            <strong style="color: red;">{{ $errors->first('longitude') }}</strong>
                        </span>
                        @endif
                        <div id="map"></div>
                    </div>
                </div>


                @endif


{{-- {{dd($table_id)}} --}}


                <div class="footer-c">
                    @if ($resActive == 1)
                <button class="button primary-button" type="submit">@lang('messages.sendOrder')</button>
                @endif
<input type="hidden" name="table_id" id="table_id" value="{{$table_id == null ? 0: $table_id}}">

                <a href="{{route('restaurants',$user)}}" class="custom-btn red-bc external">
                    @lang('messages.back-to-home')
                </a>
                    </div>
        </div>
        </form>


        @endisset
        @isset($cart)
        @else
        <div class="table-footer">
            <a href="{{route('restaurants',$user)}}" class="custom-btn red-bc external">
                @lang('messages.back-to-home')
            </a>
        </div>
        @endisset

    </div>
    </div>
    <!--End Col-md-12 col-sm-12-->
    </div>
    <!--End row-->
    </div>
    <!--End Container-->
</section>
<!--End section-->
<!-- Loading
==========================================-->
{{-- <div class="loader">
    <div class="loader-cont">
        <div class="spin"></div>
        {{ trans('messages.loading') }} &nbsp; &nbsp; ....
</div>
</div> --}}




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/routes.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script>
        $(document).ready(function () {
            $('select[name="city_id"]').on('change' , function () {
                var city_id = $(this).val();

                if(city_id)
                {
                    $.ajax({
                        url: '/get_branches/'+city_id,
                        type: 'GET',
                        datatype: 'json',
                        success: function (data) {
                            $('select[name="branch_id"]').empty();
                            $.each(data , function (key , value) {
                                $('select[name="branch_id"]').append('<option value="'+key+'">' +value+ '</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="city_id"]').empty();

                }

            });


        });
    </script>


<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        lon = position.coords.longitude;

        document.getElementById('lat').value = lat; //latitude
        document.getElementById('lng').value = lon; //longitude
        latlon = new google.maps.LatLng(lat, lon)
        mapholder = document.getElementById('mapholder')
        //mapholder.style.height='250px';
        //mapholder.style.width='100%';

        var myOptions = {
            center: latlon,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.SMALL
            }
        };
        var map = new google.maps.Map(document.getElementById("map"), myOptions);
        var marker = new google.maps.Marker({
            position: latlon,
            map: map,
            title: "You are here!"
        });
    }

</script>

{{-- {{dd($table_id)}} --}}
<script type="text/javascript">
    var map;

    function initMap() {
        var latitude = 24.774265; // YOUR LATITUDE VALUE
        var longitude = 46.738586; // YOUR LONGITUDE VALUE
        var myLatLng = {
            lat: latitude,
            lng: longitude
        };
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 5,
            gestureHandling: 'true',
            zoomControl: false // disable the default map zoom on double click
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            //title: 'Hello World'

            // setting latitude & longitude as title of the marker
            // title is shown when you hover over the marker
            title: latitude + ', ' + longitude
        });

        //Listen for any clicks on the map.
        google.maps.event.addListener(map, 'click', function(event) {
            //Get the location that the user clicked.
            var clickedLocation = event.latLng;
            //If the marker hasn't been added.
            if (marker === false) {
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true //make it draggable
                });
                //Listen for drag events!
                google.maps.event.addListener(marker, 'dragend', function(event) {
                    markerLocation();
                });
            } else {
                //Marker has already been added, so just change its location.
                marker.setPosition(clickedLocation);
            }
            //Get the marker's location.
            markerLocation();
        });

        function markerLocation() {
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat').value = currentLocation.lat(); //latitude
            document.getElementById('lng').value = currentLocation.lng(); //longitude
        }
    }

</script>

<script>
    $(document).ready(function(){
        // $(function() {


        $inadd1 = document.getElementById('saturday');
        $total = document.getElementById('total');

        $city = document.getElementById('hide-city');
        $map = document.getElementById('hide-map');
        $table = $('#table_id').val();
        // alert($table);
        console.log($city);
        console.log($map);
        $selected = $("input[name='delivery_status']");
        $del = $("#del");

        $selectedVal = $("input[name='delivery_status']:checked").val();
        // console.log($selectedVal);
        // $total = $("#total");
        {{--$del = {{$deliveryPrice}};--}}


        // $city.style.display='none';
        // $map.style.display='block';
        // $(".hide-all-location").hide();

        // alert($table);
        if($table == 0){
            $city.style.display='none';

            $("input[name='delivery_status']").on('click', function() {
                var selected = $("input[name='delivery_status']:checked").val();
                if (selected == 0) {
                    console.log($city);
                    console.log($map);
                    $city.style.display='none';
                    $map.style.display='block';
                    // console.log(selected);
                        $inadd1.style.display='block';
                        $total.innerHTML = {{$totalPrice == null ? 0 : $totalPrice }};
                } else {
                    $map.style.display='none';
                    $city.style.display='block';
                    $inadd1.style.display='none';
                        {{--$total.innerHTML -=  {{$deliveryPrice}};--}}
                        $total.innerHTML = {{$totalPrice == null ? 0 : $totalPrice}} - $del.val();
                        // console.log(selected);
                }
            });
        }else{
            $("input[name='delivery_status']").on('click', function() {
                var selected = $("input[name='delivery_status']:checked").val();
                if (selected == 0) {
                    console.log($city);
                    console.log($map);
                    $city.style.display='none';
                    $map.style.display='none';
                    // console.log(selected);
                        $inadd1.style.display='none';
                        $total.innerHTML = {{$totalPrice == null ? 0 : $totalPrice }};
                } else {
                    $map.style.display='none';
                    $city.style.display='none';
                    $inadd1.style.display='none';
                        {{--$total.innerHTML -=  {{$deliveryPrice}};--}}
                        $total.innerHTML = {{$totalPrice == null ? 0 : $totalPrice}} - $del.val();
                        // console.log(selected);
                }
            });
        }

});
    // });
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFUMq5htfgLMNYvN4cuHvfGmhe8AwBeKU&callback=initMap" async defer></script>


</body>

</html>
