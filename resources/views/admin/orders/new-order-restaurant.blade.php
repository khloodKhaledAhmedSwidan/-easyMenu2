@extends('website.restaurants-layouts.master')

@section('title')
الطلبات
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.bootstrap-rtl.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
<style>
    #map {
        height: 500px;
        width: 500px;
    }
</style>
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ url('home') }}">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('redirect.order') }}">الطلبات</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض الطلبات</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الطلبات
    {{--<small>عرض جميع الطلبات</small>--}}
</h1>
@include('flash::message')
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="table-toolbar">
                    {{-- <div class="row">
                        <div class="col-lg-6">
                            <div class="btn-group">
                                <a class="btn sbold green" href="{{ route('orders.create') }}"> إضافة جديد
                    <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>

        </div> --}}
    </div>
    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
        <thead>
            <tr>
                <th>رقم الطلب</th>
                <th>اسم العميل</th>
                <th>هاتف العميل</th>
                <th>المحل</th>
                <th>الفرع</th>
                <th>نوع التسليم</th>
                <th>سعر الطلب</th>
                <th>ملاحظات الطلب</th>
            </tr>
        </thead>

        <tbody>
            <tr class="odd gradeX">
                <td class="no_dec">{{ $order->id }}</td>
                <td class="no_dec">{{ $order->name }}</td>
                <td class="no_dec">{{ $order->phone }}</td>
                <td class="no_dec">{{ $order->user->name }}</td>
                <td class="no_dec">{{ $order->branch['name_ar'] }}</td>
                <td class="no_dec">
                    @if ( $order->delivery == 0)
                    توصيل للعنوان
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal{{$order->id}}">
                        عرض الموقع
                    </button>
                    <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">عنوان العميل</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <div class="body-site hideThis">
                                        <div class="d-flex">
                                            <div class="col-m-9">
                                                <div class="content sections">
                                                    <input type="hidden" id="lat" name="lat"
                                                        value="{{$order->latitude}}">
                                                    <input type="hidden" id="long" name="long"
                                                        value="{{$order->longitude}}">
                                                    <div id="map"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    @endif

                </td>

                <td class="no_dec">{{ $order_details->totalPrice }}</td>
                <td class="no_dec">{{$order->notes}}</td>
            </tr>
        </tbody>
    </table>

</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>

<div class="container">
    <div class="row">
        <h4> الوجبات الموجوده في الطلب </h4>
    </div>
    <br>
    <div class="row">
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
                <tr>
                    <th>اسم الوجبة</th>
                    <th>الكمية</th>
                    <th>الحجم</th>
                    <th>الاضافات الاساسية</th>
                    <th>الاضافات الجانبية</th>
                    {{-- <th>السعر</th> --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($order_details->items as $meal)
                {{-- {{dd($meal['item']->sizes()->where('id',$meal['size'])->first() == null ? '' : $meal['item']->sizes()->where('id',$meal['size'])->first()->size_ar)}}
                --}}
                <tr class="odd gradeX">
                    <td class="no_dec">{{ $meal['item']->name_ar }}</td>
                    <td class="no_dec">{{ $meal['quantity'] }}</td>
                    <td class="no_dec">
                        {{ $meal['item']->sizes()->where('id',$meal['size'])->first() == null ? '' : $meal['item']->sizes()->where('id',$meal['size'])->first()->size_ar }}
                    </td>
                    <td class="no_dec">
                        @if($meal['main_additions'] != null)
                        @foreach ($meal['main_additions'] as $key => $add_id)
                        {{App\Addition::find($add_id)->name_ar}}<br />
                        @endforeach
                        @endif
                    </td>
                    <td class="no_dec">
                        @if($meal['more_additions'] != null)
                        @foreach ($meal['more_additions'] as $key => $add_id)
                        {{App\Addition::find($add_id)->name_ar}} <br />
                        @endforeach
                        @endif
                    </td>
                    {{-- <td class="no_dec">{{ $order-> }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


@endsection
@section('content')
@if (session('information'))
<div class="alert alert-success">
    {{ session('information') }}
</div>
@endif
@if (session('pass'))
<div class="alert alert-success">
    {{ session('pass') }}
</div>
@endif
@if (session('privacy'))
<div class="alert alert-success">
    {{ session('privacy') }}
</div>
@endif
@endsection

@section('scripts')
<script src="{{ URL::asset('admin/js/datatable.js') }}"></script>
<script src="{{ URL::asset('admin/js/datatables.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/datatables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('admin/js/table-datatables-managed.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/ui-sweetalert.min.js') }}"></script>

<script>
    $( document ).ready(function () {
            $('body').on('click', '.delete_data', function() {
                var id = $(this).attr('data');
                // console.log(id);
                var swal_text = 'حذف ' + $(this).attr('data_name');
                var swal_title = 'هل أنت متأكد من الحذف ؟';

                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق"
                }, function() {

                    window.location.href = "{{ url('/') }}" + "/admin/orders/"+id+"/delete" ;

                });

            });
        });
</script>

<script type="text/javascript">
    var map;

    function initMap() {
    var lat = Number.parseFloat($("#lat").val());
    var long = Number.parseFloat($("#long").val());
    var latitude = lat // YOUR LATITUDE VALUE
    var longitude = long; // YOUR LONGITUDE VALUE
    var myLatLng = {lat: latitude, lng: longitude};
    map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 5,
    gestureHandling: 'true',
    zoomControl: false// disable the default map zoom on double click
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
    if(marker === false){
    //Create the marker.
    marker = new google.maps.Marker({
    position: clickedLocation,
    map: map,
    draggable: true //make it draggable
    });
    //Listen for drag events!
    google.maps.event.addListener(marker, 'dragend', function(event){
    markerLocation();
    });
    } else{
    //Marker has already been added, so just change its location.
    marker.setPosition(clickedLocation);
    }
    //Get the marker's location.
    markerLocation();
    });

    function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude
    }
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFUMq5htfgLMNYvN4cuHvfGmhe8AwBeKU&callback=initMap" async
    defer></script>

@endsection
