@extends('website.restaurants-layouts.master')

@php
$meals = App\Meal::where('user_id',auth()->user()->id)->count();
$orders = App\Order::where('user_id',auth()->user()->id)->count();
$branches = App\User::where('restaurant_id',auth()->user()->id)->count();

$varBranchs = auth()->user()->restaurantBranches;
@endphp

@section('title')
لوحة التحكم
@endsection

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/home"> لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>الرئيسية</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الإحصائيات
    <small>عرض الإحصائيات</small>
</h1>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{route('branches.index')}}">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{$branches}}</span>
                </div>
                <div class="desc"> الفروع</div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{route('meals.index')}}">
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

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 yellow" >
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>

            <div class="details">
                <div class="number">
                   <span>{{$orders}}</span>
                </div>
                 <div class="desc">   عدد الطلبات    </div>
            </div>
        </a>
    </div>


    @foreach ($varBranchs as $branch)

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 yellow">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>

                        {{$branch->branchOrders->count()}}
                    </span>
                </div>
             <div class="desc"> عدد طلبات فرع : {{$branch->name_ar}} </div>
            </div>
        </a>
    </div>

    @endforeach
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
