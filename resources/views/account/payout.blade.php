
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


@defaultBackground: #546e7a;
@labelColor: fadeout(#FFF, 25);
@color: #FFF;

@actionColor: #ffc107;
@chaseActionColor: #FFE597;

@chaseBackground: #62BAFF;
@bankOfAmericaBackground: #F1F9FF;
@bofaLabelColor: fadeout(#0067B1, 65);
@wellsFargoBackground: #CD1309;

.card{
  max-width: 600px;
  margin: auto;
  border-radius: 2px;
  margin-top: 3em;
  color: @color;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
  transition: all .3s ease;
  padding: 0 10px;
  background-color: @defaultBackground;
  
  &.chase, &.bofa, &.wellsFargo{
    .knownBank{
      display: inline-block;
      .logo{
        height: 25px;
        background-repeat: no-repeat;
        background-size: contain;
      }
    }
    
    .unknownBank{
      display: none;
    }
  }
  
  &.chase {
    background-color: @chaseBackground;
    
    .logo{
      background-image: url(https://upload.wikimedia.org/wikipedia/en/e/ed/Chase_logo_2007.svg);
    }
    
    .info , .confirm{
      color: #FFF;
    }
    
    #removeCard{
       color: @chaseActionColor; 
      
      &:hover, &:active {
        color: lighten(@actionColor, 50);
      }
    }
    
    
  }
  
  &.bofa {
    background-color: @bankOfAmericaBackground;
    
    .logo{
      background-image: url(https://upload.wikimedia.org/wikipedia/commons/2/20/Bank_of_America_logo.svg);
    }
    
    .info .title{
      color: @bofaLabelColor;
    }
    
    .info {
      color: #000;
    }
    
    .footer{
      border-top-color: @bofaLabelColor;
    }
  }
  
  &.wellsFargo {
    background-color: @wellsFargoBackground;
    
    .knownBank .logo{
      height: 75px;
      background-image: url(https://upload.wikimedia.org/wikipedia/commons/b/b3/Wells_Fargo_Bank.svg);
    }
    
    .info , .confirm{
      color: #FFF;
    }
  }
}

.status{
  text-align: right;
  margin-top: -3.5em;
  text-transform: uppercase;
    
  &.pending {    
    color: #00C3FF;
  }
  
  &.verified {    
    color: @labelColor;
  }
}

.title{
  text-align: center;
  padding: 10px 0;
}

.title i{
  font-size: 2.5em;
  line-height: 2em;
  border-radius: 50%;
  background-color: #FFF;
  height: 75px;
  width: 75px;
  color: @defaultBackground;
  margin-top: -6em;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
}

.info{
  .title{
    text-align: left;
    margin: 0;
    padding: 5px 0;
    color:  @labelColor;
  }
  margin: 10px 0;
}

.footer{
  border-top: 1px solid @labelColor;
  padding: 20px;
  text-align: right;
  text-transform: uppercase;
  position: relative;
  
  .action, .confirm{
    transition: all 0.3s ease;
    opacity: 0;
  }
  
  .confirm{
    display: none;
  }
  
  .reveal{
    opacity: 1;
  }
  
  a{
    transition: color .3s ease;
    color: @actionColor;
    margin: 0 5px;
    
    &:hover, &:active{
      color: lighten(@actionColor, 30);
      text-decoration: none;
    }
  }
}


i.fa.fa-bank {
    font-size: 35px;
}
</style>
<section class="dash-details">
 <div class="container">
    <div class="row">

      @include('account.sidebar')
      
      <div class="col-sm-9">
        <div class="page-details">
          <h1>Payout settings</h1><br>
          <p class="mb-3">Current payout methods:</p>
          <div class="row">
              @php
              
            $banks = DB::table('bank_accounts')->where('user_id',Auth::user()->id)->get();
          @endphp
          @foreach ($banks as $bank)
            <div class="col-sm-6">
              <div class="card" style="padding: 0; height:220px;">
                <div class="card-body">
                  <div class="row justify-content-end">
                    <img style="width:40px; cursor: pointer;" src="https://cdn.poparide.com/static/pop/webui/common/images/icons/icon-settings.863df44f3270.png" alt="">
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-2">
                        <div class=""><i class="fa fa-bank"></i></div>
                    </div>
                    <div class="col-sm-10">
                      @if ($loop->index == 0)
                        <button class="btn btn-dark"  style="padding: 0px 7px;font-size: 11px;">Default</button> 
                      @endif
                        {{-- <button class="btn btn-dark"  style="padding: 0px 7px;font-size: 11px;">Default</button> --}}
                        <h5 class="mt-2">Bank</h5>
                        <p><b>Name: </b>{{ $bank->first_name.' '. $bank->last_name}}</p>
                        <p><b>Account no.</b> XXXX XXXX XXXX {{ substr($bank->account_no, -4) }}</p>
                        <p><b>institution : </b>{{ $bank->institution_no}}</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
            <div class="col-sm-6">
              <div class="card" style="padding: 0; height:220px;">
                <div class="card-body">
                  <div class="row justify-content-end">
                    <img style="width:40px; cursor: pointer;" src="https://cdn.poparide.com/static/pop/webui/common/images/icons/icon-settings.863df44f3270.png" alt="">
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-2">
                        <div class=""><img src="https://cdn.poparide.com/static/pop/webui/common/images/payouts/paypal.e18125cc583e.png" alt=""></div>
                    </div>
                    <div class="col-sm-10">
                        <button class="btn btn-dark"  style="padding: 0px 7px;font-size: 11px;">Default</button>
                        <h5 class="mt-2">PayPal</h5>
                        <p>demo93119@gmail.com (CAD)</p>
                        <p>Payout schedule: <a href="#" style="text-decoration: underline;">Daily Change</a></p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <a href="{{ url('account/payoutmethods/create') }}" class="button darkgrey edit_btn col-sm-5 mt-4">Add a payout method</a>


        <div class="row">
          <div class="col-sm-12">
            
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
