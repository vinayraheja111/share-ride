
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

/* Background circles start */
.circle {
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(#006db3, #29b6f6);
}
.circles {
  position: absolute;
  height: 270px;
  width: 450px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Background circles end */

.card-group {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.card {
    position: relative;
    height: 270px;
    width: 450px;
    border-radius: 25px;
    backdrop-filter: blur(30px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 80px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    background: #1488cc;
    background: linear-gradient(to left, #040404, #1e2022);
    font-family: "Josefin Sans", sans-serif;
}

.logo img,
.chip img,
.number,
.name,
.from,
.to,
.ring {
  position: absolute; /* All items inside card should have absolute position */
}

.logo img {
  top: 35px;
  right: 40px;
  width: 80px;
  height: auto;
  opacity: 0.8;
}

.chip img {
  top: 120px;
  left: 40px;
  width: 50px;
  height: auto;
  opacity: 0.8;
}

.number,
.name,
.from,
.to {
  color: rgba(255, 255, 255, 0.8);
  font-weight: 400;
  letter-spacing: 2px;
  text-shadow: 0 0 2px rgba(0, 0, 0, 0.6);
}

.number {
  left: 40px;
  bottom: 65px;
  font-family: "Nunito", sans-serif;
}

.name {
  font-size: 13px;
  left: 40px;
  bottom: 35px;
}

.from {
  font-size: 13px;
  bottom: 35px;
  right: 110px;
}

.to {
  font-size: 13px;
  bottom: 35px;
  right: 40px;
}

/* The two rings on the card background */
.ring {
  height: 500px;
  width: 500px;
  border-radius: 50%;
  background: transparent;
  border: 50px solid rgba(255, 255, 255, 0.1);
  bottom: -250px;
  right: -250px;
  box-sizing: border-box;
}

.ring::after {
  content: "";
  position: absolute;
  height: 600px;
  width: 600px;
  border-radius: 50%;
  background: transparent;
  border: 30px solid rgba(255, 255, 255, 0.1);
  bottom: -80px;
  right: -110px;
  box-sizing: border-box;
}

</style>
<section class="dash-details">
 <div class="container">
    <div class="row">

      @include('account.sidebar')
      
      <div class="col-sm-9">
        <div class="page-details">
          <h1>Payment settings</h1><br>
          @if (Auth::user()->card_number == null)
          <p class="font-20">You don't have any payment methods set up yet.</p><br>
          <a href="{{ url('account/add-payment') }}" class="button darkgrey edit_btn col-sm-5 mt-4">Add payment method</a>
          @else
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="logo"><img src="https://raw.githubusercontent.com/dasShounak/freeUseImages/main/Visa-Logo-PNG-Image.png" alt="Visa"></div>
                <div class="chip"><img src="https://raw.githubusercontent.com/dasShounak/freeUseImages/main/chip.png" alt="chip"></div>
                <div class="number">{{ Auth::user()->card_number }}</div>
                <div class="name">{{ Auth::user()->cardholder_name }}</div>
                <div class="from">{{ Auth::user()->card_exp }}</div>
                <div class="to">{{ Auth::user()->card_cvv }}</div>
                <div class="ring"></div>
              </div>
            </div>
          </div>
          @endif
           
        </div>
      </div>
    </div>
  </div>

  @endsection
