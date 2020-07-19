@extends('website.restaurants-layouts.master')

@php
$meals = App\Meal::where('user_id',auth()->user()->id)->count();
$orders = App\Order::where('branch_id',auth()->user()->id)->count();
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
            <span>الإحصائيات</span>
        </li>
    </ul>
</div>

<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            welcome in your dashboard {{auth()->user()->name}}
            
        </div>
    </div>
</div>
@endsection
