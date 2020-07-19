@extends('admin.layouts.master')

@section('title')
الشروط والاحكام
@endsection
@section('styles')
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
            <a href="/admin/pages/terms">الشروط والاحكام</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>تعديل الشروط والاحكام</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الشروط والاحكام
    <small>تعديل الشروط والاحكام</small>
</h1>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row">

    <div class="col-md-8">
        <!-- BEGIN TAB PORTLET-->
        @if(count($errors))
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        @include('flash::message')
        <form action="{{route('postTerms')}}" method="post">
            <input type='hidden' name='_token' value='{{Session::token()}}'>

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->

                <div class="row">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered table-responsive">
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">العنوان</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="العنوان" name="title"
                                                value="{{$data->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">المحتوي</label>
                                        <div class="col-md-9">
                                            <textarea type="text" id="description2" class="form-control"
                                                placeholder="المحتوي" name="content">
                                            {{$data->content}}
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">العنوان بالانجليزية</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="العنوان بالانجليزية"
                                                name="title_en" value="{{$data->title_en}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">المحتوي بالانجليزية</label>
                                        <div class="col-md-9">
                                            <textarea type="text" id="description1" class="form-control"
                                                placeholder="المحتوي بالانجليزية" name="content_en">
                                            {{$data->content_en}}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->

                </div>

                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">حفظ</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END TAB PORTLET-->





    </div>
</div>

@endsection

@section('scripts')

<script src="{{ URL::asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description1');
    CKEDITOR.replace('description2');
</script>




@endsection
