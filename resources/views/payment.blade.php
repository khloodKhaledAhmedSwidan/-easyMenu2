<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اطياف الكيف</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

@php
$bank = App\Setting::first();
@endphp

<body>

    <style>
        .section {
            display: flex;
            flex-flow: row wrap;
        }
.btn-warning , .btn-default{
    width: auto;
    background: #c5b683;
    color: #fff;
    text-transform: uppercase;
    font-weight: 900;
    padding: 16px 50px;
   
    border: none;
    margin-top: 37px;
        font-family: 'Tajawal';
    cursor: pointer;
    
}

        input[type="radio"]:checked+label::after {
            color: #3d3f43;
            font-family: Material-Design-Iconic-Font;
            border: 2px solid #1dc973;
            content: "\f26b";
            font-size: 24px;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            height: 50px;
            width: 50px;
            line-height: 50px;
            text-align: center;
            border-radius: 50%;
            background: white;
            box-shadow: 0px 2px 5px -2px rgba(0, 0, 0, 0.25);
        }

        .section>div {
            flex: none;
            width: 32%;
            display: flex;
            flex-wrap: wrap;
            align-content: stretch;

            padding: 0.3rem;
        }

        input[type="radio"] {
            display: none;

            &:not(:disabled)~label {
                cursor: pointer;
            }

            &:disabled~label {
                color: hsla(150, 5%, 75%, 1);
                border-color: hsla(150, 5%, 75%, 1);
                box-shadow: none;
                cursor: not-allowed;
            }
        }

        .radiolabel {

            display: block;
            background: white;
            border: 2px solid hsla(150, 75%, 50%, 1);
            border-radius: 20px;
            padding: 5px;
            width: 94%;
            margin-bottom: 1rem;

            text-align: center;
            box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
            position: relative;
        }

        .radiolabel h2 {
            font-size: 22px;
            padding-top: 30px;
            padding-bottom: 0;
            margin-bottom: 0;

        }

        input[type="radio"]:checked+label {
            background: hsla(150, 75%, 50%, 1);
            color: hsla(215, 0%, 100%, 1);
            box-shadow: 0px 0px 20px hsla(150, 100%, 50%, 0.75);

            &::after {
                color: hsla(215, 5%, 25%, 1);
                font-family: FontAwesome;
                border: 2px solid hsla(150, 75%, 45%, 1);
                content: "\f00c";
                font-size: 24px;
                position: absolute;
                top: -25px;
                left: 50%;
                transform: translateX(-50%);
                height: 50px;
                width: 50px;
                line-height: 50px;
                text-align: center;
                border-radius: 50%;
                background: white;
                box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
            }
        }




        @media only screen and (max-width: 700px) {
            .section>div {
                flex: none;
                width: 46%;
                display: flex;
                flex-wrap: wrap;
                align-content: stretch;
            }

            .radiolabel h2 {
                font-size: 14px;
            }
        }
    </style>


    <div class="main" dir="rtl">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <p style="text-align: center;"><img src="images/logo.png"
                        style="max-width: 300px; padding-top: 30px;" /></p>

                <p style="text-align: center;">لحظاتك الجميلة .. معنا خالدة </p>
                <div class="row text-center">
                    <p>@include('flash::message')</p>
                </div>
                <div class="signup-content">


                    <form method="POST" action="{{route('post-payment',$order->id)}}" enctype="multipart/form-data"
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
                            <input type="number" name="totalPrice" id="total" readonly value="{{$order->price}}">
                            <input type="submit" name="submit" id="send" class="form-submit" value="الدفع" />
                        </div>
                    </form>

                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
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
                    imageUrl: "{{asset('images/logo.png')}}",
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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


</html>
