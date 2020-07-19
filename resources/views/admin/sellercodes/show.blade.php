@extends('admin.layouts.master')

@section('title')
اكواد الاحالة
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
            <a href="{{ url('admin/home') }}">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('admin/seller-code') }}">اكواد الاحالة</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض اكواد الاحالة</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> اكواد الاحالة
    {{--<small>عرض جميع اكواد الاحالة</small>--}}
</h1>
@include('flash::message')
@endsection
@section('content')



<div class="row">
    <div class="col-lg-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <br>
                <p>الطلبات المستخدم فيها الكود</p>
                <br>
                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                    id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                {{-- <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label> --}}
                                #
                            </th>
                            <th>اسم الموظف</th>
                            <th>رقم الطلب </th>
                            <th> باقة الطلب </th>
                            <th> العمولة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $orders = App\Subscription::where('seller_code',$sellerCode->name)->where('status',1)->get();
                        $sum = 0;
                        @endphp
                        @foreach ($orders as $item)
                        @php
                        $sum += ($item->price * $sellerCode->percentage)/100 ;
                        @endphp
                        <tr>
                            <td>
                                {{-- <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="1" />
                                    <span></span>
                                </label> --}}
                                {{$loop->iteration}}
                            </td>
                            <td> {{$sellerCode->seller_name}} </td>
                            <td> {{$item->id}} </td>
                            <td> {{$item->package->name}} </td>
                            <td> {{($item->price * $sellerCode->percentage)/100 }} ريال </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <h4> الاجمالي : {{$sum}} ريال</h4>
                </div>
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

@endsection
