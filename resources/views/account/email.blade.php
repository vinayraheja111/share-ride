
@extends('rides.layouts.app')
@section('title','Notification')
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
          <h1>Email Addresses</h1><br>
          <p class="font-20">The following e-mail addresses are associated with your account:</p><br>
          <div class="row">
                <div class="col-md-10">
                    <p><input type="radio" name="a" class="primary_email" checked data-id="primary" id="">&nbsp;&nbsp;{{ Auth::user()->email }}</p>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="email-button" style='background:#212529;'>Primary</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="email-button verified" style="background: #05AC09;">Verified</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
          @if(isset($another_email))
            @foreach ($another_email as $email)
              <div class="row">
                @if ($email->is_verified == 'unverified')
                
                
                
                <div class="col-md-10">
                    <p><input type="radio" name="a" class="primary_email" value="{{ $email->id }}" id="">&nbsp;&nbsp;{{ $email->email }}</p>
                </div>
                
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            @if($email->is_verified == 'unverified')
                            <button class="email-button verified" style="background: #ff6060;">Unverified</button>
                            @else
                            <button class="email-button verified" disabled style="background: #ff6060;">Verified</button>
                            @endif
                        </div>
                        
                    </div>
                    
                </div>
                <div class="row mt-2 text-center">
                  <i style="text-align: right;font-size: 15px;font-weight: 300;">   Please check your email for a verification link</i>
                </div>
                @else
                <div class="row">
                  <div class="col-md-10">
                      <p><input type="radio" name="a" class="primary_email"  value="{{ $email->id }}">&nbsp;&nbsp;{{ $email->email }}</p>
                  </div>
                  <div class="col-md-2">
                      <div class="row">
                          <div class="col-sm-6">
                              {{-- <button class="email-button" style='background:#212529;'>Primary</button> --}}
                          </div>
                          <div class="col-sm-6">
                              <button class="email-button verified" style="background: #05AC09;">Verified</button>
                          </div>
                      </div>
                  </div>
              </div>
                @endif
            </div>
            <hr>
            @endforeach
            @endif
            
            <div class="row mt-4">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-outline-secondary inline-btn make_primary">Make Primary</button>
                    <button type="button" class="btn btn-outline-secondary inline-btn">Re-send Verification</button>
                    <button type="button" class="btn btn-outline-danger inline-btn delete_email">Delete</button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12">
                    <p  class="add-mail-button open-form">Add another email address</p>
                </div>
            </div>
            <div class="row mt-5 email-container" style="display: none;">
                <form action="{{ url('account/email') }}" method="POST">
                  @csrf
                  <div class="col-sm-12">
                    <h5 style="color: #4C4C4C;">Add an email address to your account</h5>
                    <div class="col-md-4 mt-3 position-relative location">
                      <input type="email" name="email" class="form-control valid" placeholder="Enter email address" >
                        <div id="error-message1" style="color: red;"></div>
                    </div>
                    <div class="mt-2">
                      <button type="submit" class="button darkgrey" id="trip-post-button">Add email address</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @push('custom-scripts')
    <script>
      $(document).ready(function(){
        $('.open-form').click(function(){
          $('.email-container').fadeToggle();
        })
        $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      }
    });
      var siteUrl = jQuery('meta[name="site-url"]').attr('content');
      var data = null;
      var primary = 'primary';
      $(".primary_email").click(function(){
          data = $(this).val();
          primary = $(this).attr('data-id');
          console.log(primary);
      })
        $(".make_primary").click(function(){
          // data = $(this).val();
          if( data != null){
              if(primary != null){
                    $("#javascript_success").html(`Primary email successfully changed`);
                    $("#javascript_success").show();
                    primary = null;
              }else{
                  $.ajax({
                  type: "POST",
                  data: {data: data},
                  url: siteUrl + "/account/make-primary",
                  success: function(response) {
                    if (response.status == "success") {
                        $("#javascript_success").html(`Primary email successfully changed`);
                    $("#javascript_success").show();
                      window.location.reload();
                    }
                  },
                });
              }
          }
        });
        $(".delete_email").click(function(){
          if(data != null){
              if(primary != null){
                    $("#javascript_error").html(`Can't delete primary email.`);
                    $("#javascript_error").show();
                    primary = null;
              }else{
                $.ajax({
                  type: "POST",
                  data: {data: data},
                  url: siteUrl + "/account/delete-email",
                  success: function(response) {
                    if (response.status == "success") {
                      window.location.reload();
                    }
                  },
                });
            }
          }
        });
      })
    </script>
  @endpush