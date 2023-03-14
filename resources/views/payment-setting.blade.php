@extends('layouts.app')
@section('title','Payment Setting')
@section('content')
<style>
    #stripe-elements-input {
        padding: 15px;
        box-sizing: border-box;
        max-width: 420px;
        background: #ececec;
        border-radius: 15px;
        border: none;
        color: #565a5c;
    }

    .credit-card-form .form-row {
        position: relative;
    }

    .error {
        color: red;
    }
</style>
<section>

    <div class="container py-sm-5">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-md-8">
                <form method="post" action="{{url('payment-store')}}" id="payment">
                    @csrf
                    <div class="payment_mothod">
                        <h3>Payment method</h3>
                        <div class="hr mb-3"></div>
                        <div class="col-md-6 text-start slect-change">
                            <label for="" class="mb-3 mt-3">Name on card</label>
                            <input class="form-control" name="cardholder_name" id="cardholder_name" placeholder="Enter card name" size='4' value="{{Auth::user()->cardholder_name ?? ''}}" required>
                            <span class="text-danger d-none" id="error_span_1"></span>
                        </div>
                        <div class="card-stye mt-3 mb-3">
                            <input id="card_number" type="number" name="card_number" placeholder="XXXX XXXX XXXX XXXX" size='20' style="width: 200px;background: transparent;border: none;" value="{{Auth::user()->card_number ?? ''}}" required>
                            <input id="exp_month" type="text" name="exp_month" placeholder="MM" size='2' style="width: 200px;background: transparent;border: none;" value="{{Auth::user()->exp_month ?? ''}}" required>
                            <input id="exp_year" type="text" name="exp_year" placeholder="MM/YY" size='4' style="width: 200px;background: transparent;border: none;" value="{{Auth::user()->exp_year ?? ''}}" required>
                            <input id="cvc" name="cvc" size='4' type="number" placeholder="CVC" style="width: 130px;background: transparent;border: none;color:#565a5c;" required>
                        </div>
                        <!-- <span class="text-danger d-none" id="number_error"></span>
                        <span class="text-danger d-none" id="month_error"></span>
                        <span class="text-danger d-none" id="year_error"></span>
                        <span class="text-danger d-none" id="cvv_error"></span> -->
                        
                        <span class="text-danger d-none" id="error_span_3"></span>
                        <div class="mt-5 mb-3 " id="booking-rigt">
                            <input type="submit" value="Add payment method" class="button darkgrey" id="trip-post-button">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- <script>
    $(document).ready(function() {
        $('#payment').submit(function(e) {
            e.preventDefault();
            var name, card_number, exp_month, exp_year, cvc, checkbox;
            name = $("#cardholder_name").val();
            card_number = $("#card_number").val();
            exp_month = $("#exp_month").val();
            exp_year = $("#exp_year").val();
            cvc = $("#cvc").val();
            checkbox = $("#checkbox").val();
            if (name == '' || card_number == '' || exp_month == '' || exp_year == '' || cvc == '') {
                if (name == "") {
                    $("#error_span_1").removeClass('d-none');
                    $("#error_span_1").text('Name field is required');
                } else {
                    $("#error_span_1").addClass('d-none');
                    $("#error_span_1").text(' ');
                }
                if (card_number == "") {
                    $("#number_error").removeClass('d-none');
                    $("#number_error").text('Card field is required');
                } else {
                    $("#number_error").addClass('d-none');
                }
                if (exp_month == "") {
                    $("#month_error").removeClass('d-none');
                    $("#month_error").text('Month field is required');
                } else {
                    $("#month_error").addClass('d-none');
                    $("#month_error").text(' ');
                }
                if (exp_year == "") {
                    $("#year_error").removeClass('d-none');
                    $("#year_error").text('Year field is required');
                } else {
                    $("#year_error").addClass('d-none');
                    $("#year_error").text(' ');
                }
                if (cvc == "") {
                    $("#cvv_error").removeClass('d-none');
                    $("#cvv_error").text('CVV field is required');
                } else {
                    $("#cvv_error").addClass('d-none');
                    $("#cvv_error").text(' ');
                }
                if (checkbox == "") {
                    $("#error_span_3").removeClass('d-none');
                    $("#error_span_3").text('field is required');
                } else {
                    $("#error_span_3").addClass('d-none');
                }
            }
        })
    });
</script> -->

@endsection