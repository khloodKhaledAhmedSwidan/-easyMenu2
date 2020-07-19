@extends('website.restaurants-layouts.master')


@section('title')
اضافة حجم
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
            <span>اضافة حجم</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الوجبات
    <small>اضافة حجم</small>
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
                        <form role="form" action="{{route('meals.storeSize',$meal_id)}}" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">


                                        <div class="form-group">
                                            <label class="control-label"> الاسم </label>
                                            <input type="text" name="size_ar" class="form-control"
                                                placeholder="اسم الحجم" value="{{old('size_ar')}}" />
                                            @if ($errors->has('size_ar'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('size_ar') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> الاسم بالانجليزية </label>
                                            <input type="text" name="size" class="form-control" placeholder="اسم الحجم"
                                                value="{{old('size')}}" />
                                            @if ($errors->has('size'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('size') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> السعر </label>
                                            <input type="number" name="price" class="form-control"
                                                placeholder="سعر الحجم" value="{{old('price')}}" />
                                            @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('price') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> السعرات الحرارية</label>
                                            <input type="number" name="calories" class="form-control"
                                                placeholder=" السعرات الحرارية" value="{{old('calories')}}" />
                                            @if ($errors->has('calories'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('calories') }}</strong>
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
