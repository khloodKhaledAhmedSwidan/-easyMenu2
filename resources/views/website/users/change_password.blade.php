@extends('website.restaurants-layouts.master')

@section('title')
@lang('messages.change_passsword')
@endsection

@section('styles')

<link rel="stylesheet" href="{{ URL::asset('inner.css') }}">
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ url('admin/edit-profile') }}">@lang('messages.edit_profile')</a>
            <i class="fa fa-circle"></i>
        </li>

        <li>
            <span>@lang('messages.change_passsword')</span>
        </li>
    </ul>
</div>

<hr>

<div class="row">
    <div class="col-md-6 margin-auto">
        <a href="{{route('res-update-info')}}"
         class="btn btn-info {{ strpos(URL::current(), 'admin/edit-profile') !== false ? 'hide' : '' }}">
        @lang('messages.edit_profile')
        </a>

        <a href="{{route('res.changePass')}}"
            class="btn btn-info {{ strpos(URL::current(), 'admin/change-password') !== false ? 'hide' : '' }}">
           @lang('messages.change_password')
        </a>

    </div>
</div>

<h1 class="page-title"> @lang('messages.change_passsword') </h1>
@include('flash::message')

@endsection


@section('content')


<div class="row">
    <div class="col-lg-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">

   {!! Form::model($model, ['action'=>['HomeController@changePassword'],'method'=>'post']) !!}
         <div class="form-group">
                @if (app()->getLocale() == 'ar')
                {{Form::label('password','الرقم السري ')}}
                @else
                {{Form::label('password','Password')}}
                @endif
             <input type="password" id="password" name="password" placeholder="@lang('messages.change_passswordField')" required class="form-control"/>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                @if (app()->getLocale() == 'ar')
                {{Form::label('password_confirmation',' تأكيد الرقم السري ')}}
                @else
                {{Form::label('password_confirmation',' Password Confirmation ')}}
                @endif
            <input type="password" placeholder="@lang('messages.confirm_password')" id="password_confirmation" required class="form-control" name="password_confirmation"/>

                @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>

                   <div class="form-group">
                @if (app()->getLocale() == 'ar')
                {!! Form::submit('تعديل', ['class' => 'btn btn-primary px-1']) !!}
                @else
                {!! Form::submit('Update', ['class' => 'btn btn-primary px-1']) !!}
                @endif
            </div>

                {!!Form::close()!!}

            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection

