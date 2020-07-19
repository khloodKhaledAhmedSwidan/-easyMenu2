<html lang="en" itemscope="" itemtype="http://schema.org/Product" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta name="theme-color" content="#27323E">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> EASY MENU </title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles-mobile.css')}}">
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
    <!-- <link rel="stylesheet" href="../bonee-gallery.css">   -->
    <link rel="preload" href="styles.css" as="style">
    <link rel="preload" href="ui.js" as="script">

</head>
@php
$bank = App\Setting::first();
@endphp
<body dir="rtl" class="body-mobile" style="overflow-x:hidden">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link href="{{asset('card.css')}}" rel="stylesheet">

<div class="social-box">

    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-xs-6">
                <div class="box">

                    <div class="portlet-body">

                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                            <div class="tab-pane active" id="tab_1_1">
                                <div> @include('flash::message')</div>
                                <hr/>
                            <form method="POST" action="{{route('payMoney',$subscription)}}" enctype="multipart/form-data"
                        id="signup-form" class="signup-form">@csrf


                        <div class="row" id="bank">
                            <div class="col-md-9">
                                <a class="disabled">الدفع بالتحويل البنكي</a>
                                <h5>اسم البنك : {{$bank->bank_name}}</h5>
                                <p>رقم الحساب : {{$bank->account_number}}</p>
                                <br />
                                <div class="form-group">
                                    <label for="payment_image"> ادخل صورة التحويل البنكي </label>
                                    <input type="file" name="payment_image" class="form-control">
                                </div>
                                @if ($errors->has('payment_image'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('payment_image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="row" id="fatoora">
                            <div class="col-md-9">
                                <a class="disabled">الدفع الالكتروني</a>
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <input type="number" name="totalPrice" id="total" readonly value="{{$order->price}}"> --}}
                            <input type="submit" name="submit" id="send" class="form-submit" value="الدفع" />
                        </div>
                    </form>





                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>

<<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
<script src="{{ URL::asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/ui-sweetalert.min.js') }}"></script>
<script src="js/main.js"></script>
<script>
    $(document).ready(function () {
        $("#fatoora").hide();
        $("#bank").hide();
        $("#send").hide();
        // $('body').on('click', '.delete_data', function() {
            var id = $(this).attr('data');
            var swal_text = ' ';
            var swal_title = 'اختر طريقة دفع';

            swal({
                title: swal_title,
                text: swal_text,
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                // imageUrl: "{{asset('images/logo.png')}}",
                confirmButtonText: "دفع الكتروني",
                cancelButtonText: "تحويل بنكي"
            }, function(data) {
                if(data == true){
                    $("#fatoora").show();
                    $("#send").show();
                }else{
                    $("#bank").show();
                    $("#send").show();
                }
            });
        // });
});
</script>

</body>

</html>
