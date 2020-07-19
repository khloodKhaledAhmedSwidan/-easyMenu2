@extends('website.restaurants-layouts.master')


@section('title')
عرض وجبة
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-fileinput.css') }}">
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/home">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="/admin/meals">الوجبات</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض وجبة</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الوجبات
    <small>عرض وجبة</small>
</h1>
@endsection

@section('content')
@include('flash::message')


<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">

                        <div class="portlet-body">

                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="btn-group">
                                            <a class="btn sbold green" href="{{ route('meals.addSize',$meal->id) }}">
                                                إضافة جديد
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">

                                    <h5>الوجبة</h5>
                                    <p>{{$meal->name_ar}}</p>
                                    <br>
                                    <h5>الاحجام</h5>
                                    <table
                                        class="table table-striped table-bordered table-hover table-checkable order-column"
                                        id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الحجم</th>
                                                <th>السعر</th>
                                                <th>السعرات الحرارية</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach( $sizes as $item )
                                            <tr class="odd gradeX">
                                                <td>{{$loop->iteration}}</td>
                                                <td class="no_dec">{{$item->size_ar}}</td>
                                                <td class="no_dec">{{$item->price}}</td>
                                                <td class="no_dec">{{$item->calories}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-expanded="false"> العمليات
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a
                                                                    href="{{route('deleteSize',['meal_id'=>$meal->id,'size_id'=>$item->id])}}"><i
                                                                        class="fa fa-trash">مسح</i>
                                                                </a>
                                                            </li>
                                                            {{-- <li>
                                                                <a href="{{route('editAddress',$item->id)}}"><i
                                                                class="fa fa-key">تعديل</i>
                                                            </a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ URL::asset('admin/js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/components-select2.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/bootstrap-fileinput.js') }}"></script>

@endsection
