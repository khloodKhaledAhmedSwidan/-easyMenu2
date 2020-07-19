@extends('admin.layouts.master')

@php
$orders = App\Order::count();
$meals = App\Meal::count();
@endphp

@section('title')
لوحة التحكم
@endsection

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/admin/home"> لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>الإحصائيات</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الإحصائيات
    <small>عرض الإحصائيات</small>
</h1>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{$admins}}</span>
                </div>
                <div class="desc"> المديرين</div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{$users}}</span>
                </div>
                <div class="desc"> المطاعم</div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 yellow">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{$orders}}</span>
                </div>
              <div class="desc"> الطلبات</div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{$meals}}</span>
                </div>
                  <div class="desc"> عدد الوجبات</div>
            </div>
        </a>
    </div>
    {{--
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a href="/admin/courses" class="dashboard-stat dashboard-stat-v2 yellow">
            <div class="visual">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{--$courses->count()--}}</span>
    {{--</div>
<div class="desc"> الدورات</div>
</div>
</a>
</div> --}}


</div>
@endsection
