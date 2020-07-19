@extends('admin.layouts.master')

@section('title')
المدفوعات البنكية
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.bootstrap-rtl.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('/admin/home')}}">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('AdminBankPayment')}}">المدفوعات البنكية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض المدفوعات البنكية</span>
        </li>
    </ul>
</div>

<h1 class="page-title">عرض المدفوعات ماي فاتورة
    <small>عرض جميع المدفوعات ماي فاتورة</small>
</h1>
@endsection

@section('content')

@if (session('msg'))
<div class="alert alert-success">
    {{ session('msg') }}
</div>
@endif
@include('flash::message')



<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered table-responsive">

            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                    id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>

                            <th></th>
                            <th> اسم الدورة </th>
                            <th> سعر الدورة </th>
                            <th> المستخدم </th>
                            <th>رقم الدفع  ماي فاتورة</th>
                            <!--<th> خيارات </th>-->



                        </tr>
                    </thead>
                    <tbody>

                        <?php $i=0 ?>
                        <? $sum = 0;?>
                        @foreach($banks as $bank)

                        <tr class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="1" />
                                    <span></span>
                                </label>
                            </td>
                            <td><?php echo ++$i ?></td>
                            <td> {{$bank->courses->name}} </td>
                            <td> {{$bank->courses->price}} </td>
                            <td> {{$bank->users->name}} </td>
                            <td> {{$bank->PaymentId }} </td>
                            
                            <!--<td>-->
                            <!--    <a href="{{route('AdminEditBankPayment' , $bank->id)}}" class="btn btn-sm blue">-->
                            <!--        <i class="icon-docs"></i> تغيير حالة المدفوعات البنكية</a>-->
                            <!--</td>-->

                        </tr>
                            <? $sum+=$bank->courses->price ?>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
        <div class="row">
        <div class="col-md-8">
            <div class="text-center">
                <h3> اجمالي المدفوعات: <span class="color:orange;">   {{$sum}}</span></h3>
            </div>
        </div> 
        </div>
    </div>
</div>

@endsection
