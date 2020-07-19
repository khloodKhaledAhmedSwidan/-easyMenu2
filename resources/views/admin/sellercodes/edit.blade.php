@extends('admin.layouts.master')


@section('title')
تعديل كود
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
            <a href="/admin/home">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="/admin/seller-code">اكواد الاحالة</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>تعديل كود</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> اكواد الاحالة
    <small>تعديل كود</small>
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
                        <form role="form" action="{{route('seller-code.update',$sellerCode)}}" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            @method('put')
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        <div class="form-group">
                                            <label class="control-label"> الكود </label>
                                            <input type="text" name="name" class="form-control" placeholder="أسم الكود"
                                                value="{{$sellerCode->name}}" />
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        
                                        <div class="form-group">
                                            <label class="control-label"> البائع </label>
                                            <input type="text" name="seller_name" class="form-control"
                                                placeholder="أسم البائع" value="{{$sellerCode->seller_name}}" />
                                            @if ($errors->has('seller_name'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('seller_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">نسبة البائع</label>
                                            <input type="number" name="percentage" class="form-control"
                                                placeholder="نسبة الكود" value="{{$sellerCode->percentage}}" />
                                            @if ($errors->has('percentage'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('percentage') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                </div>
                            </div>
                    </div>
                    <div class="margiv-top-10">
                        <div class="form-actions">
                            <button type="submit" class="btn green" value="حفظ"
                                onclick="this.disabled=true;this.value='تم الارسال, انتظر...';this.form.submit();">حفظ</button>
                        </div>
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
