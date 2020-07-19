@extends('admin.layouts.master')


@section('title')
تعديل باقة
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
            <a href="/admin/packages">الباقات</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>تعديل باقة</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الباقات
    <small>تعديل باقة</small>
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
                        <form role="form" action="{{route('packages.update',$package)}}" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            @method('put')
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        <div class="form-group">
                                            <label class="control-label"> اسم الباقة </label>
                                            <input type="text" name="name_ar" class="form-control"
                                                placeholder="أسم الباقة" value="{{$package->name_ar}}" />
                                            @if ($errors->has('name_ar'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('name_ar') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> وصف الباقة </label>
                                            <input type="text" name="description_ar" class="form-control"
                                                placeholder="وصف الباقة" value="{{$package->description_ar}}" />
                                            @if ($errors->has('description_ar'))
                                            <span class="help-block">
                                                <strong
                                                    style="color: red;">{{ $errors->first('description_ar') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> اسم الباقة بالانجليزية</label>
                                            <input type="text" name="name" class="form-control" placeholder="أسم الباقة"
                                                value="{{$package->name}}" />
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> وصف الباقة بالانجليزية</label>
                                            <input type="text" name="description" class="form-control"
                                                placeholder="وصف الباقة" value="{{$package->description}}" />
                                            @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        {{-- <div class="form-group">
                                            <label class="control-label"> عدد مرات التثبيت للمحل </label>
                                            <input type="number" name="pinned_shop_num" class="form-control"
                                                placeholder=" عدد المرات" value="{{$package->pinned_shop_num}}" />
                                        @if ($errors->has('pinned_shop_num'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('pinned_shop_num') }}</strong>
                                        </span>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <label class="control-label"> مدة الباقة بالشهر </label>
                                        <input type="number" name="duration" class="form-control"
                                            placeholder="مدة الباقة" value="{{$package->duration}}" />
                                        @if ($errors->has('duration'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('duration') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> عدد المنتجات المتاحة </label>
                                        <input type="number" name="products" class="form-control"
                                            placeholder=" عدد المنتجات" value="{{$package->products}}" />
                                        @if ($errors->has('products'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('products') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    {{-- <div class="form-group">
                                            <label class="control-label"> عدد المنتجات المثبتة </label>
                                            <input type="number" name="pinned_products" class="form-control"
                                                placeholder=" عدد المنتجات" value="{{$package->pinned_products}}" />
                                    @if ($errors->has('pinned_products'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('pinned_products') }}</strong>
                                    </span>
                                    @endif
                                </div> --}}

                                <div class="form-group">
                                    <label class="control-label"> سعر الباقة </label>
                                    <input type="number" name="price" class="form-control" placeholder="سعر الباقة"
                                        value="{{$package->price}}" />
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

@endsection
