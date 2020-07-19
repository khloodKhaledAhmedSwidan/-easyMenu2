@extends('website.restaurants-layouts.master')


@section('title')
تعديل وجبة
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
            <span>تعديل وجبة</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الوجبات
    <small>تعديل وجبة</small>
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
                        <form role="form" action="{{route('meals.update',$meal->id)}}" method="post"
                            enctype="multipart/form-data">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            @method('put')
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">


                                        <div class="form-group">
                                            <label class="control-label"> اسم الوجبة </label>
                                            <input type="text" name="name_ar" class="form-control"
                                                placeholder="أسم الوجبة" value="{{$meal->name_ar}}" />
                                            @if ($errors->has('name_ar'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('name_ar') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> اسم الوجبة بالانجليزية</label>
                                            <input type="text" name="name" class="form-control" placeholder="أسم الوجبة"
                                                value="{{$meal->name}}" />
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> وصف الوجبة </label>
                                            <input type="text" name="content_ar" class="form-control"
                                                placeholder="وصف الوجبة" value="{{$meal->content_ar}}" />
                                            @if ($errors->has('content_ar'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('content_ar') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> وصف الوجبة بالانجليزية</label>
                                            <input type="text" name="content" class="form-control"
                                                placeholder="وصف الوجبة" value="{{$meal->content}}" />
                                            @if ($errors->has('content'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('content') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> سعر الوجبة</label>
                                            <input type="number" name="price" class="form-control"
                                                placeholder="سعر الوجبة" value="{{$meal->price}}" />
                                            @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('price') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> السعرات الحرارية</label>
                                            <input type="number" name="calories" class="form-control"
                                                placeholder="السعرات الحرارية" value="{{$meal->calories}}" />
                                            @if ($errors->has('calories'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('calories') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>التصنيف</label>
                                            {!! Form::select('category_id',
                                            App\Category::where('user_id',auth()->user()->id)->pluck('name_ar','id'),
                                            $meal->category_id,
                                            ['class'=> 'select2 form-control','placeholder'=>'']) !!}
                                            @if ($errors->has('category_id'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('category_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>اختر الاضافات </label>
                                            {!! Form::select('main_additions[]',
                                            ['اساسية' =>
                                            App\Addition::where('user_id',auth()->user()->id)->where('type',0)->pluck('name_ar','id'),
                                            'جانبية' =>
                                            App\Addition::where('user_id',auth()->user()->id)->where('type',1)->pluck('name_ar','id')
                                            ],
                                            $meal->additions,
                                            ['class'=> 'select2 form-control',
                                            'placeholder'=>'','multiple'=>'true']) !!}
                                            @if ($errors->has('main_additions'))
                                            <span class="help-block">
                                                <strong style="color: red;">
                                                    {{ $errors->first('main_additions') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-body">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">الصورة</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                            data-trigger="fileinput"
                                                            style="width: 200px; height: 150px;">
                                                            <img src="{{asset('uploads/meals/'.$meal->image)}}" alt="">
                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> اختر الصورة </span>
                                                                <span class="fileinput-exists"> تغيير </span>
                                                                <input type="file" name="image"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
                                                                data-dismiss="fileinput"> إزالة </a>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('image'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('image') }}
                                                        </strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
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
