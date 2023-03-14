
@extends('rides.layouts.app')
@section('title','Notification')
@section('content')
<section class="dash-details">
 <div class="container">
    <div class="row">

      @include('account.sidebar')
      
      <div class="col-sm-9">
        <div class="page-details">
          <h1>Notifications</h1><br>
          <h5 class="font-20">Platform notifications</h5><br>
          <hr class="hr-line">

          <div class="notification-label-recommended">Recommended</div>
          <p><b>Push notifications</b><br>For all activity: bookings, messages, reviews...</p>
          <p>Install the Poparide app on <a href="#">iOS</a> or <a href="#">Android</a> to get push notifications</p>
           <hr class="hr-line">
           <div class="row">
             <div class="col-sm-9">
               <p><b>SMS text messages</b></p>
               <p>Limited to bookings only</p>
             </div>
             <div class="col-sm-3">
               <label class="switch">
                <input type="checkbox" {{ $user->sms_notification == 'true' ? 'checked' : '' }} class="notif" value="true" data-for="sms">
                <span class="slider round"></span>
              </label>
             </div>
           </div>
           <hr class="hr-line">
           <div class="row">
            <div class="col-sm-9">
              <p><b>Emails</b></p>
              <p>For all activity: bookings, messages, reviews...</p>
           <p>Sent to <b>{{ $user->email }}</b> </p>
           <a href="#"  style="text-decoration:underline ;color: #777777;">Change your email</a>
            </div>
            <div class="col-sm-3">
              <label class="switch">
               <input type="checkbox" {{ $user->email_notification == 'true' ? 'checked' : '' }} class="notif" value="true" data-for="email">
               <span class="slider round"></span>
             </label>
            </div>
          </div>
          <hr class="hr-line">
          <h5 class="font-20">Marketing notifications</h5><br>
          <p>for holiday reminders, etc.</p>
          <hr class="hr-line">

          <div class="row">
            <div class="col-sm-9">
              <p><b>Push notifications and emails</b></p>
              <p>Max one notification per month, we promise</p>
            </div>
            <div class="col-sm-3">
              <label class="switch">
               <input type="checkbox" {{ $user->email_notification == 'true_with_one' ? 'checked' : '' }}>
               <span class="slider round"></span>
             </label>
            </div>
          </div>
          <hr class="hr-line">
          <h5 class="font-20 mt-5">Marketing notifications</h5><br>
          <hr class="hr-line">

          <div class="row">
            <div class="col-sm-9">
              <p><b>Auto-requests</b></p>
              <p>New trip matches for every search you make</p>
            </div>
            <div class="col-sm-3">
              <label class="switch">
               <input type="checkbox">
               <span class="slider round"></span>
             </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
  @push('custom-scripts')
    <script>
      $(document).ready(function(){
        $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      }
    });
      var siteUrl = jQuery('meta[name="site-url"]').attr('content');
        $(".notif").click(function(){
          var notif,value_for;
          value_for = $(this).attr('data-for');
          if ($(this).is(':checked')) { 
            notif = $(this).val();
          }else{
            notif = 'false';
          } 
          $.ajax({
          type: "POST",
          data: {notif: notif,value_for:value_for},
          url: siteUrl + "/change-notifications",
          success: function(response) {
            if (response.status == "success") {
              var res = response.data;
              console.log(res);
              notif = 'false';
            }
          },
        });
        })
      })
    </script>
  @endpush