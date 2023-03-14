
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
          <h1>Payment settings</h1><br>
          <p class="font-20">Payment methods > Add payment method</p><br>
          <form action="{{ url('account/save-card') }}" method="POST">
            @csrf
         <div class="row">
          <div class="col-md-7 position-relative location">
            <label for="">Name on card</label>
            <input type="text" name="card_name" placeholder="First and last name" class="form-control">
          </div>
         </div>
         <div class="row">
          <div class="col-md-7  position-relative location">
            <label for="">Card details</label>
            <div class="card-stye mt-3 mb-3" style="width: 100%;">
              <input id="card_number" type="number" size="20" name="card_number" placeholder="XXXX XXXX XXXX XXXX" style="    width: 50%;
              background: transparent;
              border: none;"  required="">
              <input id="exp_month" type="text" name="exp_month" placeholder="MM/YY" style="width: 25%;background: transparent;
              border: none;"   required="">
              {{-- <input id="exp_year" type="text" name="exp_year" placeholder="MM/YY" style="width: 200px;background: transparent;border: none;" size="4" value="2025" required=""> --}}
              <input id="cvc" name="cvc" type="number" placeholder="CVC" style="width: 25%;
            background: transparent;
            border: none;
            color:#565a5c;" size="4" required="">
            {{-- <input id="cvc" name="postcode" type="number" placeholder="postcode" style="width: 25%;
            background: transparent;
            border: none;
            color:#565a5c;" size="4" required=""> --}}

          </div>
          </div>
         </div>
         <div class="row">
          <div class="col-sm-12">
            <button type="submit" class="button darkgrey edit_btn col-sm-5 mt-4">Add payment method</button> 
          </div>
         </div>
        </form>
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


        $('#card_number').on("input",function(){
          var val = $(this).val();
          console.log(val.length)
          if(val.length == 16){
            $(this).blur();
            $(this).next().focus();
          }
        })

        $('#exp_month').on("input",function(){
          var val = $(this).val();
          console.log(val.length)
          if(val.length == 2){
            $(this).val(val+"/");
            
          }
          if(val.length == 5){
            $(this).blur();
            $(this).next().focus();
          }
        })

        $('#cvc').on("input",function(){
          var val = $(this).val();
          console.log(val.length)
          if(val.length == 3){
            $(this).blur();
            $(this).next().focus();
          }
        })
      
        $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      }
    });
      var siteUrl = jQuery('meta[name="site-url"]').attr('content');
        $(".make_primary").click(function(){
          var data;
          var check = $("#primary_email").is(':checked');
          if(check){
            data = $("#primary_email").val();
            $.ajax({
              type: "POST",
              data: {data: data},
              url: siteUrl + "/account/make-primary",
              success: function(response) {
                if (response.status == "success") {
                  window.location.reload();
                }
              },
            });
          }
          
        })
      })
    </script>
  @endpush