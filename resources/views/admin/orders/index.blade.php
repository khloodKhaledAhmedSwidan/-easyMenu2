@extends('website.restaurants-layouts.master')

@section('title')
الطلبات الجديدة
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.bootstrap-rtl.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">

@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ url('home') }}">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('admin/orders/new') }}">الطلبات الجديدة</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض الطلبات الجديدة</span>
        </li>
    </ul>
</div>

<hr>

<div class="row">
    <div class="col-md-6 margin-auto">
        <a href="{{route('orders.index')}}"
            class="btn btn-info {{ strpos(URL::current(), 'admin/orders/new') !== false ? 'hide' : '' }}">
            الطلبات الجديدة
        </a>
        <a href="{{route('orders.active')}}"
            class="btn btn-info {{ strpos(URL::current(), 'admin/orders/active') !== false ? 'hide' : '' }}">
            الطلبات النشطة
        </a>
        <a href="{{route('orders.compeleted')}}"
            class="btn btn-info {{ strpos(URL::current(), 'admin/orders/compeleted') !== false ? 'hide' : '' }}">
            الطلبات
            المكتملة
        </a>
        <a href="{{route('orders.canceled')}}"
            class="btn btn-info {{ strpos(URL::current(), 'admin/orders/canceled') !== false ? 'hide' : '' }}">
            الطلبات الملغية
        </a>
    </div>
</div>

<h1 class="page-title"> الطلبات الجديدة
    {{--<small>عرض جميع الطلبات الجديدة</small>--}}
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
                <th>
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                        <span></span>
                    </label>
                </th>
                <th>رقم الطلب</th>
                <th>اسم العميل</th>
                <th>نوع التسليم</th>
                <th>تعديل حالة الطلب</th>
            </tr>
        </thead>
        <tbody>

            @foreach( $orders as $record )
            <tr class="odd gradeX">

                <td>
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" class="checkboxes" value="1" />
                        <span></span>
                    </label>
                </td>
                <td>{{$record->id}}</td>
                <td class="no_dec"><a href="{{route('orders.show',$record->id)}}"
                        style="color: orangered;">{{ $record->name }}</a></td>
                <td>
                  @if($record->delivery != null)
                    @if ($record->delivery == 0)
                    توصيل للعنوان
                    @else
                    استلام من الفرع
                    @endif
                    @else
                      الطلب في المطعم
                    @endif

                </td>

                <td>
                    <a href="{{route('AdminEditBankPayment' , $record->id)}}" class="btn btn-sm blue">
                        <i class="icon-docs"></i> تغيير حالة الطلب</a>
                </td>

                {{-- <td>

                    <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false"> العمليات
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-left" role="menu">

                            <li>
                                <a class="delete_data" data="{{ $record->id }}" data_name="{{ $record->name }}">
                <i class="fa fa-times"></i> الغاء
                </a>
                </li>

                </ul>
</div>
</td> --}}

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
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
                var swal_text = 'الغاء ' + $(this).attr('data_name');
                var swal_title = 'هل أنت متأكد من الالغاء ؟';

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



@endsection
