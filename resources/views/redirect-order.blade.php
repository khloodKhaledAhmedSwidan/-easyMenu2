@extends('website.restaurants-layouts.master')

@section('title')
    تعديل حالة حالة الطلب
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin/home')}}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{url('/delivery/orders')}}">الطلبات</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تحويل الطلب للفرع</span>
            </li>
        </ul>
    </div>
    <hr>

    <div class="row">
{{--        <div class="col-md-6 margin-auto">--}}
{{--            <a href="{{route('orders.index')}}"--}}
{{--               class="btn btn-info {{ strpos(URL::current(), 'admin/orders/new') !== false ? 'hide' : '' }}">--}}
{{--                الطلبات الجديدة--}}
{{--            </a>--}}
{{--            <a href="{{route('orders.active')}}"--}}
{{--               class="btn btn-info {{ strpos(URL::current(), 'admin/orders/active') !== false ? 'hide' : '' }}">--}}
{{--                الطلبات النشطة--}}
{{--            </a>--}}
{{--            <a href="{{route('orders.compeleted')}}"--}}
{{--               class="btn btn-info {{ strpos(URL::current(), 'admin/orders/compeleted') !== false ? 'hide' : '' }}">--}}
{{--                الطلبات--}}
{{--                المكتملة--}}
{{--            </a>--}}
{{--            <a href="{{route('orders.canceled')}}"--}}
{{--               class="btn btn-info {{ strpos(URL::current(), 'admin/orders/canceled') !== false ? 'hide' : '' }}">--}}
{{--                الطلبات الملغية--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>

    <h1 class="page-title"> الطلبات الجديدة
        {{--<small>عرض جميع الطلبات الجديدة</small>--}}
    </h1>

@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    @include('flash::message')

    <div class="row">

        <div class="col-md-8">
            <!-- BEGIN TAB PORTLET-->
            <form method="post" action="{{route('send.orderBranch' , $order->id)}}" enctype="multipart/form-data">
                <input type='hidden' name='_token' value='{{Session::token()}}'>


                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="row">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered table-responsive">
                            <div class="portlet-body form">
                                <div class="form-horizontal" role="form">

                                    <div class="form-group">
                                        <label for="gender" class=" control-label">اختر الفرع</label>
                                        {{-- <div class="col-lg-9"> --}}
                                        <div class=" input-group select2-bootstrap-append">

                                            <select name="allBranches" class="form-control select2-allow-clear">
                                                @foreach($allBranches as $branch)
                                                <option value="{{$branch->id}}" > {{$branch->name_ar}}
                                                </option>
                                                @endforeach
                                            </select>

                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"
                                                    data-select2-open="single-append-text">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                        </div>
                                        {{-- </div> --}}
                                    </div>



                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->


                    </div>


                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->



                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">تحويل الطلب</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END TAB PORTLET-->





        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ URL::asset('admin/js/datatable.js') }}"></script>
    <script src="{{ URL::asset('admin/js/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/datatables.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('admin/js/table-datatables-managed.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/ui-sweetalert.min.js') }}"></script>
    <script>
        firebase.database().ref('AdminNotificationsAcceptAds').remove();
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('body').on('click', '.delete_offer', function() {
                var id = $(this).attr('data');

                var swal_text = 'حذف ' + $(this).attr('data_name') + '؟';
                var swal_title = 'هل أنت متأكد من الحذف ؟';

                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق",
                    closeOnConfirm: false
                }, function() {

                    window.location.href = "{{ url('/') }}" + "/admin/delete/"+id+"/checkCenter";


                });

            });

        });


    </script>



@endsection
