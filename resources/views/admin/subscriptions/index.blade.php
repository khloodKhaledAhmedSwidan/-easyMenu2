@extends('admin.layouts.master')

@section('title')
الطلبات
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
            <a href="/admin/home">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="/admin/subscriptions">الطلبات</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض الطلبات</span>
        </li>
    </ul>
</div>

<h1 class="page-title">عرض الطلبات
    <small>عرض جميع الطلبات</small>
</h1>
@endsection

@section('content')
@include('flash::message')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> الطلبات</span>
                </div>

            </div>
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
                            <th> المحل </th>
                            <th> الاشتراك </th>
                            <th> كود الاحالة </th>
                            <th> كود الخصم </th>
                            <th> السعر </th>
                            <th> نوع الدفع </th>
                            <th> حالة الطلب </th>
                            <th> خيارات </th>
                            {{-- <th> الحذف </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach($records as $order)
                        <tr class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="1" />
                                    <span></span>
                                </label>
                            </td>
                            <td><?php echo ++$i ?></td>
                            <td> {{$order->user->name}} </td>
                            <td> {{$order->package->name}} </td>
                            <td> {{ $order->sellerCode != null?$order->sellerCode->name:""}} </td>
                            <td> {{$order->coupon != null?$order->coupon->name:""}} </td>
                            <td> {{$order->price}} </td>
                            <td>
                                @if ($order->invoice_id == null)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal{{$order->id}}">
                                    عرض الصورة
                                </button>
                                <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">صورة الدفع</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{asset('uploads/payment_images/'.$order->image)}}"
                                                    style="height: 300px; width: 300px;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">اغلاق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                {{$order->invoice_id}}
                                @endif
                            </td>
                            <td>
                                @if ($order->status == 0)
                                <button type="button" class="btn btn-circle red btn-sm">لم يتم الدفع</button>
                                @else
                                <button type="button" class="btn btn-circle green btn-sm">تم الدفع </button>
                                @endif
                            </td>
                            <td>
                                @if ($order->invoice_id == null)
                                <a href="{{route('subscriptions.update-status',$order->id)}}" class="btn btn-sm blue">
                                    <i class="icon-docs"></i> تغيير حالة المدفوعات البنكية</a>
                                @else
                                محاولة دفع فاشلة
                                @endif
                            </td>
                            {{-- <td>
                                <a class="delete_attribute" data="{{$order->id}}" data_name="{{$order->name}}">
                            <i class="fa fa-key"></i> مسح
                            </a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ URL::asset('admin/js/datatable.js') }}"></script>
<script src="{{ URL::asset('admin/js/datatables.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/datatables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('admin/js/table-datatables-managed.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/ui-sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
            $('body').on('click', '.delete_attribute', function() {
                // alert('here');
                var id = $(this).attr('data');
                var swal_text = 'حذف ' + $(this).attr('data_name') + '؟';
                var swal_title = 'هل أنت متأكد من الحذف ؟';
                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق",
                    closeOnConfirm: false
                }, function() {
                    window.location.href = "{{ url('/') }}" + "/admin/subscriptions/"+id+"/delete";
                });
            });
        });
</script>

@endsection
