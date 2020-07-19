@extends('website.restaurants-layouts.master')

@section('title')
@lang('messages.barcode')
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
            <span>@lang('messages.barcode')</span>
        </li>
    </ul>
</div>

<hr>

<h1 class="page-title">@lang('messages.barcode') </h1>

@endsection


@section('content')


<div class="row">
    <div class="col-lg-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">

        <div class="form-group">
                    <label> لينك المطعم</label>
                    <br>
                    {{-- <span>{{$model->link}}</span> --}}
                    <a class="btn btn-circle-right" target="_blank" style="text-decoration: none; color: #FF5722;"
                        href="{{url('restaurants/'.$model->name)}}"> @lang('messages.barcode')</a>
                    <br>
          
                    @php
                    $qr_file = QrCode::format('svg')
                    ->size(200)->errorCorrection('H')
                    ->generate(url('restaurants/'.$model->name));
                    $output_file = 'img-' . $model->name . '.svg';
                    $store = Storage::disk('test')->put($output_file, $qr_file);
                    $model->link = $output_file;
                    $model->save();
                    @endphp
                    <div class="form-group">
                        {{-- <embed src="{{asset('storage/uploads/qr-code/'.$model->link)}}" type=""> --}}
                        {!! QrCode::size(250)->generate(url('restaurants/'.$model->name)); !!}
                    </div>
              
                </div>

            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection

