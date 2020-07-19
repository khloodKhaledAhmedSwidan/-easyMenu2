<html lang="en" itemscope="" itemtype="http://schema.org/Product" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta name="theme-color" content="#27323E">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> EASY MENU </title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles-mobile.css')}}">
    <!-- <link rel="stylesheet" href="../bonee-gallery.css">   -->
    <link rel="preload" href="styles.css" as="style">
    <link rel="preload" href="ui.js" as="script">

</head>

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
{{--                    <form>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label"> اسم الباقة </label>--}}
{{--                            <input type="text" name="phone_number" class="form-control"--}}
{{--                                   value="{{$package->name_ar}}" />--}}

{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label"> وصف الباقة </label>--}}
{{--                            <input type="text" name="phone_number" class="form-control"--}}
{{--                                   value="{{$package->description_ar}}" />--}}

{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label"> السعر </label>--}}
{{--                            <input type="text" name="phone_number" class="form-control"--}}
{{--                                   value="{{$package->price}}" />--}}

{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="control-label"> المدة </label>--}}
{{--                            <input type="text" name="phone_number" class="form-control"--}}
{{--                                   value="{{$package->duration}}" />--}}

{{--                        </div>--}}

{{--                    </form>--}}

                    <div class="portlet-body">

                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                            <div class="tab-pane active" id="tab_1_1">
                                <div> @include('flash::message')</div>
                                <hr/>
                                <form method="post" id="ajax-contact" action="{{route('pay.bank',$user->id)}}">
                                    @csrf


                                    <div class="form-group">
                                        <label class="control-label"> اكتب كود الاحالة ان وجد </label>
                                        <input type="text" id="seller_code" name="seller_code" class="form-control"
                                            placeholder=" اكتب الكود إن وجد" />
                                        @if ($errors->has('seller_code'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('seller_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> اكتب كود الخصم ان وجد قبل الدفع</label>
                                        <input type="text" id="coupon" name="coupon" class="form-control"
                                            placeholder=" اكتب الخصم إن وجد" />
                                        @if ($errors->has('coupon'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('coupon') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-actions">
                                        <input type="submit" id="checkCoupon" value="ارسال" class="btn btn-info">

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

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 {{-- <script type="text/javascript">

    function test(){
        $id = {{$user->id}};
        var coupon = $('#coupon').val();

        $.ajax({
                url: '/pay-by-bank/'+$id,
                // url: $(form).attr('action'),
                data: {
                    "_token": "{{ csrf_token() }}",
                    coupon:coupon,

                },
                type: "POST",
                dataType: 'json',
                success:function (data) {
                    console.log(data);
                    
                }
            })
    }
    
    $(document).ready(function () {

        






        $('#formForPay').hide();

        $('#checkCoupon').on('click',function () {
            var form = $('#ajax-contact');
            var coupon = $('#coupon').val();
            alert('here');
            $.ajax({
                url:"{{route('pay.bank',$user->id)}}",
                url: $(form).attr('action'),
                data: {
                    "_token": "{{ csrf_token() }}",
                    coupon:coupon,

                },
                type: "POST",
                dataType: 'json',
                success:function (data) {
                    console.log(data);
                    // $('#formForPay').show();
                    // var payByBank = $("input[name='payment']:checked").val();
                    // var payInvoice = $("input[name='payment']:checked").val();
                    // if(payByBank){
                    //     $("#getCodeModal").modal("toggle");
                    //     $("#getCode").html(msg);
                    // }else{
                    //     ////////////////////////
                    // }
                }
            });
        });
    });




</script> --}}

</body>

</html>
