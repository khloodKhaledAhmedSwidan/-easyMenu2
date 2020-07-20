@extends('website.restaurants-layouts.master')

@section('title')
@lang('messages.edit_profile')
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('inner.css') }}">

@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
                 <i class="fa fa-circle"></i>
            <a href="{{route('res-update-info') }}">
                تعديل بياناتى
{{--                @lang('messages.edit_profile')--}}
            </a>

        </li>


    </ul>
</div>

<hr>

<div class="row">
    <div class="col-md-6 margin-auto">
        <a href="{{route('res-update-info')}}"
         class="btn btn-info {{ strpos(URL::current(), 'admin/edit-profile') !== false ? 'hide' : '' }}">
            تعديل بياناتى
{{--        @lang('messages.edit_profile')--}}
        </a>

        <a href="{{route('res.changePass')}}"
            class="btn btn-info {{ strpos(URL::current(), 'admin/change-password') !== false ? 'hide' : '' }}">
            تغيير كلمة المرور
{{--           @lang('messages.change_password')--}}
        </a>

    </div>
</div>

<h1 class="page-title">
    تعديل بياناتى
{{--    @lang('messages.edit_profile') --}}
</h1>
@include('flash::message')
@endsection


@section('content')


<div class="row">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->


              <div class="col-md-9">


   {!! Form::model($model, ['action'=>['HomeController@updateProfile'],'method'=>'post', 'enctype'
            => 'multipart/form-data']) !!}
                <div class="form-group">
{{--                    @if (app()->getLocale() == 'ar')--}}
                    {{Form::label('name_ar','اسم المطعم')}}
{{--                    @else--}}
{{--                    {{Form::label('name_ar','Restaurant Name')}}--}}
{{--                    @endif--}}

                    {{Form::text('name_ar',$model->name_ar,['class'=>'form-control','required'])}}
                    @if ($errors->has('name_ar'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name_ar') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
{{--                    @if (app()->getLocale() == 'ar')--}}
                    {{Form::label('name','اسم المطعم بالانجليزية')}}
{{--                    @else--}}
{{--                    {{Form::label('name','Restaurant Name in English')}}--}}
{{--                    @endif--}}
                    {{Form::text('name',$model->name,['class'=>'form-control','required'])}}
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>



                <div class="form-group">
{{--                    @if (app()->getLocale() == 'ar')--}}
                    {{Form::label('email','ايميل المطعم')}}
{{--                    @else--}}
{{--                    {{Form::label('email','Restaurant Email')}}--}}
{{--                    @endif--}}
                    {{Form::text('email',$model->email,['class'=>'form-control','required'])}}
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
{{--                    @if (app()->getLocale() == 'ar')--}}
                    {{Form::label('phone_number','هاتف المطعم')}}
{{--                    @else--}}
{{--                    {{Form::label('phone_number','Restaurant phone')}}--}}
{{--                    @endif--}}
                    {{Form::text('phone_number',$model->phone_number,['required','class'=>'form-control'])}}

                    @if ($errors->has('phone_number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label-stripped">توصيل الطلبات</label>
                    <input type="radio" name="delivery" value="1" {{$model->delivery == 1 ? 'checked':''}}>
                    <span>نعم</span>
                    <input type="radio" name="delivery" value="0" {{$model->delivery == 0 ? 'checked':''}}>
                    <span>لا</span>
                    @error('delivery')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('delivery') }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" id="price">
                    <label class="form-label">سعر التوصيل</label>
                    <input type="number" name="delivery_price" class="form-control" value="{{$model->delivery_price}}">
                    @error('delivery_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('delivery_price') }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group" id="price">
                    <label class="form-label">الحد الأدني</label>
                    <input type="number" name="minimum" class="form-control" value="{{$model->minimum}}">
                    @error('minimum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('minimum') }}</strong>
                    </span>
                    @enderror
                </div>
                <label class="form-label">مدة التوصيل</label>
                <div class="form-group" >
                    <div class="container">
                        <div class="col-sm-3">
                            <label class="form-label">من</label>
                            <input type="number" name="delivery_from" class="form-control" value="{{$model->delivery_from}}">
                            @error('delivery_from')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('delivery_from') }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">  الي</label>
                            <input type="number" name="delivery_to" class="form-control" value="{{$model->delivery_to}}">
                            @error('delivery_to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('delivery_to') }}</strong>
                            </span>
                            @enderror
                        </div>


                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">  وصف المطعم</label>
                    <textarea class="form-control" name="description" cols="10" rows="10">{{$model->description}}</textarea>
{{--                    <input type="number" name="description" class="form-control" value="{{$model->description}}">--}}
                    @error('delivery_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('delivery_price') }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group" id="price">
                    <label class="form-label">الضريبة</label>
                    <input type="number" name="vat" class="form-control" value="{{$model->vat}}">
                @error('vat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('vat') }}</strong>
                </span>
                @enderror
            </div>




       <div class="form-group">
{{--                @if (app()->getLocale() == 'ar')--}}
                {{Form::label('image','تغيير الصورة الشخصية')}}
{{--                @else--}}
{{--                {{Form::label('image','Update Image')}}--}}
{{--                @endif--}}
                {!! Form::file('image', ['class'=>'form-control']) !!}
                @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
            </div>
                             <div class="form-group">
{{--                @if (app()->getLocale() == 'ar')--}}
                {!! Form::submit('تعديل', ['class' => 'btn btn-primary']) !!}
{{--                @else--}}
{{--                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}--}}
{{--                @endif--}}
            </div>
            {!! Form::close() !!}
                  </div>

                   <div class="col-md-3">

                      <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                @if($model->image !==null)
                <img src='{{ asset("uploads/users/$model->image") }}'>
                @endif
            </div>
                    </div>

                 </div>


        <!-- END EXAMPLE TABLE PORTLET-->

</div>

@endsection
@section('scripts')
<script>
    $( document ).ready(function () {
        var test = $("input:radio[name=delivery]:checked").val()
        test == 1 ? $("#price").show():$("#price").hide() ;
        $('input:radio[name=delivery]').on('change' , function () {
            var test = $("input:radio[name=delivery]:checked").val()
            test == 1 ? $("#price").show():$("#price").hide() ;
        });
    });
</script>

@endsection
