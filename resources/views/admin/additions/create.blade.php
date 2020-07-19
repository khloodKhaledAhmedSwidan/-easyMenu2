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
            <a href="/admin/additions">الاضافات</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>اضافة جديد</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الاضافات
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
                        <form role="form" action="{{route('additions.store')}}" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        <div class="form-group">
                                            <label class="control-label"> اسم الاضافة </label>
                                            <input type="text" name="name_ar" class="form-control"
                                                placeholder="أسم الاضافة" />
                                            @if ($errors->has('name_ar'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('name_ar') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> اسم الاضافة بالانجليزية</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="أسم الاضافة" />
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> نوع الاضافة </label><br>
                                            <input type="radio" name="type" class="with-gap" value="0" />
                                            <span>اساسية</span>
                                            <br>
                                            <input type="radio" name="type" class="with-gap" value="1" />
                                            <span>اضافية</span>
                                            @if ($errors->has('type'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('type') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> سعر الاضافة </label>
                                            <input type="number" name="price" class="form-control" placeholder="0" />
                                            @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('price') }}</strong>
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
<script>
    function clear(){
        alert('here');
    }
</script>

@endsection
