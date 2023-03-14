
@extends('rides.layouts.app')
@section('title','Payment')
@section('content')
<style>
    button.email-button {
    padding: 2px 5px;
    border: none;
    font-size: 14px;
    color: #fff;
    border-radius: 10px;
}

button.inline-btn {
    border-radius: 20px;
    padding: 5px 10px;
    font-size: 12px;
    font-weight: 600;
    border: 2px solid;
}

p.add-mail-button {
    font-size: 14px;
    font-weight: 600;
    text-decoration: underline;
    color: #4C4C4C;
    cursor: pointer;
}

.location .form-control {
    border-radius: 10px;
    font-family: "ProximaSoft", sans-serif;
    /* cursor: pointer; */
    box-sizing: border-box;
    /* margin-left: 12px; */
    border: none;
    width: 100%;
    font-size: 16px;
    color: #565a5c;
    background-color: #ececec;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    padding: 13px 10px;
}
button#trip-post-button {
    padding: 10px 20px;
}
</style>
<section class="dash-details">
 <div class="container">
    <div class="row">

      @include('account.sidebar')
      
      <div class="col-sm-9">
        <div class="page-details">
          <h1>Payout settings</h1><br>
          <p class="font-20">You don't have any payment methods set up yet.</p><br>   
            <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="padding: 0; height:310px;">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 16px;">In Canada</h5>
                          <hr class="mt-3">
                          <div class="row mt-3 align-items-center">
                            <div class="col-sm-3">
                                <div class=""><img src="https://cdn.poparide.com/static/pop/webui/common/images/icons/bank.4e3ae2a803a8.svg" alt=""></div>
                            </div>
                            <div class="col-sm-9">
                                <h5>Bank account ($CAD)</h5>
                            </div>
                          </div>
                          <ul class="mt-3" style="    margin-left: 30px;">
                            <li><p>• Daily payouts</p></li>
                            <li><p>• Secure transfers</p></li>
                          </ul>
                          <a href="{{ url('account/payoutmethods/create/bank') }}" class="button darkgrey edit_btn col-sm-6 mt-4" style="padding: 10px 10px 10px 50px">Add Bank</a>
                        </div>
                      </div>
                </div>
                <div class="col-sm-6">
                    <div class="card" style="padding: 0; height:310px;">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 16px;">For international travellers</h5>
                          <hr class="mt-3">
                          <div class="row mt-3 align-items-center">
                            <div class="col-sm-3">
                                <div class=""><img src="https://cdn.poparide.com/static/pop/webui/common/images/payouts/paypal.e18125cc583e.png" alt=""></div>
                            </div>
                            <div class="col-sm-9">
                                <h5>PayPal</h5>
                            </div>
                          </div>
                          <ul class="mt-3" style="    margin-left: 30px;">
                            <li><p>• Daily payouts</p></li>
                            <li><p>• Exchange rates may apply*</p></li>
                          </ul>
                             <a href="{{ url('account/payoutmethods/create') }}" class="button darkgrey edit_btn col-sm-6 mt-4" style="padding: 10px 10px 10px 50px">Add paypal</a>

                        </div>
                      </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
