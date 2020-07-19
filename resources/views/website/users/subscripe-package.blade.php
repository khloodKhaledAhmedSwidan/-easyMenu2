@extends('website.restaurants-layouts.master')


@section('title')
اضافة جديد
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('inner.css') }}">
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
            <a href="/admin/categories">التصنيفات</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>اضافة جديد</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> التصنيفات
    <small>اضافة جديد</small>
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
                        <form role="form" >
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        <div class="form-group">
                                            <label class="control-label"> اسم الباقة </label>
                                            <input type="text"  class="form-control"
                                        value="{{$subscription->package->name_ar}}"  />
                        
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> وصف الباقة</label>
                                            <input type="text"  class="form-control"
                                        value="{{$subscription->package->description_ar}}" />
                                          
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> المدة المتبقية</label>
                                            <input type="text" class="form-control"
                                        value="" />
                                          
                                        </div>
                                      
                                        <div class="form-group">
                                
                                        <a class="btn green" href="{{route('change.package',$subscription->package_id)}}">تغيير الباقة</a>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="margiv-top-10">
                               
                            </div>
                        </form>
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
