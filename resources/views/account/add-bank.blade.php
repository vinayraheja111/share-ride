
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
          <h1>Add a bank account</h1><br>
          <p class="font-20">You don't have any payment methods set up yet.</p><br>
          {{-- <a href="{{ url('account/payoutmethods/create') }}" class="button darkgrey edit_btn col-sm-5 mt-4">Add a payout method</a> --}}
            <p><b>Confirm your personal details</b></p>
            <form action="{{ url('account/save-bank') }}" method="POST" class="mt-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 position-relative location">
                        <p class="mb-2">First name</p>
                        <input type="text" class="form-control" name="first_name" placeholder="Your full legal first name">
                    </div>
                    <div class="col-md-6 position-relative location">
                        <p class="mb-2">Last name</p>
                        <input type="text" class="form-control" name="last_name" placeholder="Your full legal last name">
                    </div>
                    <div class="col-md-6 mt-3 position-relative location">
                        <p class="mb-2">Date of birth</p>
                        <input type="date" class="form-control" name="date_of_birth" placeholder="1992-06-16">
                    </div>
                    
                </div>
                <p class="mt-3"><b>Enter your address</b></p>
                <div class="row mt-3">
                    <div class="col-md-12 position-relative location">
                        <p class="mb-2">Address</p>
                        <input type="text" name="address" class="form-control"  placeholder="Enter your address">
                    </div>
                    <div class="col-md-6 mt-3 position-relative location">
                        <p class="mb-2">City</p>
                        <input type="text" name="city" class="form-control" placeholder="Enter your city">
                    </div>
                    <div class="col-md-6 mt-3 position-relative location">
                        <p class="mb-2">Province</p>
                        <input type="number" name="province" class="form-control" placeholder="1992-06-16">
                    </div>
                    <div class="col-md-6 mt-3 position-relative location">
                        <p class="mb-2">Post code</p>
                        <input type="number" name="postcode" class="form-control" placeholder="e.g. V5Y 3X2">
                    </div>
                    <div class="col-md-6 mt-3 position-relative location">
                        <p class="mb-2">Country</p>
                        <input type="text" name="country" class="form-control" placeholder="1992-06-16">
                    </div>
                    
                </div>

                <p class="mt-3"><b>Enter your bank account details</b></p>
                <div class="row mt-3">
                    <div class="col-md-6 mt-3 position-relative location">
                        <p class="mb-2">Bank account number</p>
                        <input type="number" name="account_no" class="form-control"  placeholder="Enter your address">
                    </div>
                    <div class="col-md-3 mt-3 position-relative location">
                        <p class="mb-2">Transit number</p>
                        <input type="number" name="transit_no" class="form-control" placeholder="Enter your city">
                    </div>
                    <div class="col-md-3 mt-3 position-relative location">
                        <p class="mb-2">Institution number</p>
                        <input type="number" name="institution_no" class="form-control" placeholder="1992-06-16">
                    </div>
                    <div class="col-md-6 mt-3 position-relative location">
                        <p class="mb-2">Currency</p>
                        <input type="text" name="currency" class="form-control" placeholder="e.g. V5Y 3X2">
                    </div>
                </div>
                <p class="mt-3"><b>Terms and conditions</b></p>
                <div class="row mt-3">
                    <div class="col-sm-12">
                   <input name="term_condition" value="1" type="checkbox">&nbsp;&nbsp;<span>I have read and reviewed the Payouts terms and conditions</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <button type="submit" class="button darkgrey edit_btn col-sm-6 mt-4" style="padding: 10px 10px 10px 50px">Add Bank</button>

                    </div>                    
                </div>
            </form>
           
        </div>
      </div>
    </div>
  </div>

  @endsection
