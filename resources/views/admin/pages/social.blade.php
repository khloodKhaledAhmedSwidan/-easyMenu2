@extends('admin.layouts.master')

@section('title')
تعديل اعدادات التواصل الاجتماعي
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
            <a href="/admin/courses">اعدادات التواصل الاجتماعي</a>
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
                        <form role="form" action="/admin/social" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="form-group">
                                            <label class="control-label"> الفايس بوك </label>
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="ادخل الفايس بوك هنا " value="{{$record->facebook}}"
                                                required />
                                            @if ($errors->has('facebook'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('facebook') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">تويتر</label>
                                            <input type="text" name="twitter" class="form-control"
                                                value="{{$record->twitter}}" placeholder=" ادخل تويتر هنا" required />
                                            @if ($errors->has('twitter'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('twitter') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">لينكد ان</label>
                                            <input name="linkedin" class="form-control" rows="5"
                                                placeholder="ادخل لينكد ان هنا " value="{{$record->linkedin}}" >
                                            @if ($errors->has('linkedin'))
                                            <span class=" help-block">
                                                <strong style="color: red;">{{ $errors->first('linkedin') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">انستغرام</label>
                                            <input name="instagram" class="form-control" rows="5"
                                                placeholder=" هناادخل الانستغرام" value="{{$record->instagram}}"
                                                >
                                            @if ($errors->has('instagram'))
                                            <span class=" help-block">
                                                <strong style="color: red;">{{ $errors->first('instagram') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">اليوتيوب</label>
                                            <input name="youtube" class="form-control" rows="5"
                                                placeholder=" هناادخل الاليوتيوب" value="{{$record->youtube}}"
                                                >
                                            @if ($errors->has('youtube'))
                                            <span class=" help-block">
                                                <strong style="color: red;">{{ $errors->first('youtube') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">جوجل بلس</label>
                                            <input name="google_plus" class="form-control" rows="5"
                                                placeholder=" هناادخل جوجل بلس" value="{{$record->google_plus}}"
                                                >
                                            @if ($errors->has('google_plus'))
                                            <span class=" help-block">
                                                <strong style="color: red;">{{ $errors->first('google_plus') }}</strong>
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
