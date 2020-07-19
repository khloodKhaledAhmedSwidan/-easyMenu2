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
<form>
    <div class="form-group">
        <label class="control-label"> اسم الباقة </label>
        <input type="text" name="phone_number" class="form-control"
               value="{{$package->name_ar}}" />

    </div>
    <div class="form-group">
        <label class="control-label"> وصف الباقة </label>
        <input type="text" name="phone_number" class="form-control"
                value="{{$package->description_ar}}" />

    </div>
    <div class="form-group">
        <label class="control-label"> السعر </label>
        <input type="text" name="phone_number" class="form-control"
               value="{{$package->price}}" />

    </div>

    <div class="form-group">
        <label class="control-label"> المدة </label>
        <input type="text" name="phone_number" class="form-control"
               value="{{$package->duration}}" />

    </div>

</form>

                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

<hr/>
                                        <form method="post" id="ajax-contact" action="{{route('restaurant_subscribe',$package->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label"> اكتب الايميل </label>
                                                <input type="email" id="restEmail" name="email" class="form-control"
                                                       placeholder="اكتب الايميل" required />
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"> اكتب كود الاحاله </label>
                                                <input type="text" id="sellerCode" name="sellerCode" class="form-control"
                                                       placeholder="اكتب كود الاحاله" required />
                                                @if ($errors->has('sellerCode'))
                                                    <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('sellerCode') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label"> اكتب الخصم ان وجد</label>
                                                <input type="text" id="coupon" name="coupon" class="form-control"
                                                       placeholder=" اكتب الخصم إن وجد" />
                                                @if ($errors->has('coupon'))
                                                    <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('coupon') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="form-actions">
                                                <input type="submit" id="checkCoupon" value="حفظ" class="btn btn-info">

                                            </div>
                                        </form>

<form  id="formForPay">
    <label class="radio-inline"><input type="radio" name="payment"  id="payByBank" value="byBank">الدفع عن طريق البنك</label><br>
    <label class="radio-inline"><input type="radio" name="payment" id="payInvoice" value="byInvoice">ماي فاتورة</label>
</form>


                                        <!-- Modal -->
                                        <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"> API CODE </h4>
                                                    </div>
                                                    <div class="modal-body" id="getCode" style="overflow-x: scroll;">
                                                        //ajax success content here.
                                                        // هرفع الصورة
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>



        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#formForPay').hide();

$('#checkCoupon').on('click',function () {
    var form = $('#ajax-contact');
    var coupon = $('#coupon').val();
    var email = $('#restEmail').val();
    var sellerCode = $('#sellerCode').val();
    console.log(coupon + "" + email+"" +sellerCode);
    $.ajax({
        {{--url:"{{route('restaurant_subscribe',$package->id)}}",--}}
        url: $(form).attr('action'),
        data: {
            "_token": "{{ csrf_token() }}",
            coupon:coupon,
            email:email,
            sellerCode:sellerCode
        },
        type: "POST",
        dataType: 'json',
        success:function (data) {
console.log(data);
            $('#formForPay').show();
            var payByBank = $("input[name='payment']:checked").val();
            var payInvoice = $("input[name='payment']:checked").val();
            if(payByBank){
                $("#getCodeModal").modal("toggle");
                $("#getCode").html(msg);
            }else{
                ////////////////////////
            }
        }
    });
});
    });




</script>

</body>

</html>
