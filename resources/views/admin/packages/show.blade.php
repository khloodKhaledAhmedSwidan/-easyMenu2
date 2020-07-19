@extends('admin.layouts.master')


@section('title')
    اضافة باقة
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
            </li>
            <li>
                <a >وصف الباقة</a>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الباقات
        <small>عرض الباقة</small>
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
{{-- {{dd($package->subscriptions)}} --}}
                            <form>
                                <input type='hidden' name='_token' value='{{Session::token()}}'>
                                <div class="portlet-body">

                                    <div class="tab-content">
                                        <!-- PERSONAL INFO TAB -->
                                        <div class="tab-pane active" id="tab_1_1">

                                            <div class="form-group">
                                                <label class="control-label"> اسم الباقة </label>
                                                <input readonly type="text" name="name_ar" class="form-control"
                                                    value="{{$package->name_ar}}"/>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label"> وصف الباقة </label>
                                                {{-- <input readonly type="text" name="description_ar" class="form-control"
                                                    value="{{$package->description_ar}}"/> --}}
                                                    <p class="form-control" aria-readonly="true" >
                                                        {{$package->description_ar}}
                                                    </p>
                                            {{-- <textarea name="description_ar" class="form-control"  cols="30" rows="10">
                                                {{$package->description_ar}}
                                            </textarea> --}}
                                            </div>

                                            {{-- <div class="form-group">
                                                <label class="control-label"> اسم الباقة بالانجليزية</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{$package->name}}"/>
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                <label class="control-label"> وصف الباقة بالانجليزية</label>
                                                <input type="text" name="description" class="form-control"
                                                    value="{{$package->description}}"/>
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                <label class="control-label"> عدد مرات التثبيت للمحل </label>
                                                <input type="number" name="pinned_shop_num" class="form-control"
                                                    placeholder=" عدد مرات التثبيت" value="{{old('pinned_shop_num')}}" />
                                            @if ($errors->has('pinned_shop_num'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('pinned_shop_num') }}</strong>
                                            </span>
                                            @endif
                                        </div> --}}

                                            <div class="form-group">
                                                <label class="control-label"> مدة الباقة بالشهر </label>
                                                <input readonly type="number" name="duration" class="form-control"
                                                      value="{{$package->duration}}"/>

                                            </div>

                                            {{-- <div class="form-group">
                                                <label class="control-label"> عدد المنتجات المتاحة </label>
                                                <input type="number"  class="form-control"
                                                     value="{{$package->products}}"/>
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                    <label class="control-label"> عدد المنتجات المثبتة </label>
                                                    <input type="number" name="pinned_products" class="form-control"
                                                        placeholder=" عدد المنتجات" value="{{old('pinned_products')}}" />
                                            @if ($errors->has('pinned_products'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('pinned_products') }}</strong>
                                            </span>
                                            @endif
                                        </div> --}}

                                            <div class="form-group">
                                                <label class="control-label"> سعر الباقة </label>
                                                <input readonly type="number" name="price" class="form-control"
                                                       value="{{$package->price}}"/>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="margiv-top-10">
                                    <div class="form-actions">
                                        {{--                                        <button type="submit" class="btn green" value="حفظ"--}}
                                        {{--                                                onclick="this.disabled=true;this.value='تم الارسال, انتظر...';this.form.submit();">حفظ</button>--}}
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
