@extends('admin.layouts.master')

@section('title')
تعديل اعدادات التواصل
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
            <a href="/admin/courses">اعدادات التواصل</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>تعديل الاعدادت</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الاعدادات
    <small>تعديل</small>
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
                        <form role="form" action="/admin/info-setting" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="form-group">
                                            <label class="control-label"> البريد الالكتروني </label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="ادخل البريد هنا" value="{{$record->email}}" required />
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">الهاتف</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{$record->phone}}" placeholder=" الهاتف" required />
                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">الهاتف المحمول</label>
                                            <input name="cellphone" class="form-control" rows="5"
                                                placeholder="ادخل الهاتف المحمول" value="{{$record->cellphone}}"
                                                required>
                                            @if ($errors->has('cellphone'))
                                            <span class=" help-block">
                                                <strong style="color: red;">{{ $errors->first('cellphone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">العنوان</label>
                                            <input name="address" class="form-control" rows="5"
                                                placeholder="ادخل العنوان" value="{{$record->address}}" required>
                                            @if ($errors->has('address'))
                                            <span class=" help-block">
                                                <strong style="color: red;">{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">نص التواصل</label>
                                            <textarea name="contact_info" class="form-control" rows="5"
                                                placeholder="ادخل نص التواصل"
                                                required> {{$record->contact_info}}</textarea>
                                            @if ($errors->has('contact_info'))
                                            <span class="help-block">
                                                <strong
                                                    style="color: red;">{{ $errors->first('contact_info') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">العنوان بالانجليزية</label>
                                            <input name="address_en" class="form-control" rows="5"
                                                placeholder="ادخل العنوان بالانجليزية" value="{{$record->address_en}}"
                                                required>
                                            @if ($errors->has('address_en'))
                                            <span class=" help-block">
                                                <strong style="color: red;">{{ $errors->first('address_en') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">نص التواصل بالانجليزية</label>
                                            <textarea name="contact_info_en" class="form-control" rows="5"
                                                placeholder="ادخل نص التواصل بالانجليزية"
                                                required> {{$record->contact_info_en}}</textarea>
                                            @if ($errors->has('contact_info_en'))
                                            <span class="help-block">
                                                <strong
                                                    style="color: red;">{{ $errors->first('contact_info_en') }}</strong>
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
    $(document).ready(function() {
    $('select[name="address[country]"]').on('change', function() {
        var id = $(this).val();
        $.ajax({
            url: '/get/cities/'+id,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('#register_city').empty();
                $('select[name="address[city]"]').append('<option value>المدينة</option>');
                // $('select[name="city"]').append('<option value>المدينة</option>');
                $.each(data['cities'], function(index , cities) {
                    $('select[name="address[city]"]').append('<option value="'+ cities.id +'">'+cities.name+'</option>');
                });
            }
        });
    });
});
</script>
@endsection
