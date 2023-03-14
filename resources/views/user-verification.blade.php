@extends('rides.layouts.app')
@section('title','userverification')
@section('content')
<style>
  

#user img.images-circle {
    width: 160px;
    height: 160px;
    border-radius: 50%;
    position: relative;
}
#user .text-image h1 {
    color: #333333;
    font-size: 24px;
    margin-top: 0px;
    margin-bottom: 0px;
    padding-top: 20px;
    padding-bottom: 20px;
}
#user .text-image h6{
    font-size: 16px !important;
    line-height: 24px;
    font-weight: 600 !important;
     color: #4C4C4C;
}
#user .text-image p{
    font-size: 16px !important;
    line-height: 24px;
    font-weight: 300;
}
.divider.light {
    background: #dfdbdb;
}
.divider {
    height: 1px;
    width: 100%;
    background: #777777;
    margin: 10px 0px 10px;
}
.user-preferences-list .user-preference-item.scents.False {
    background: url("{{asset('public/images/icon_preferences_no_smoking.6236dba6f77a.png')}}") no-repeat left -2px center;
    background-size: 40px 40px;
}
.user-preferences-list .user-preference-item.chattiness.l1 {
    background: url("{{asset('public/images/icon_preferences_chattiness_medium.9fb244059f12.png')}}") no-repeat left -5px center;
    background-size: 40px 40px;
}
.user-preferences-list .user-preference-item {
    padding-left: 48px;
    font-weight: 600;
    margin: 6px 0px;
    color: #333333;
}
.float-left {
    float: left;
}
.black {
    color: #000000 !important;
    font-size: 16px !important;
    line-height: 24px;
    font-weight: 500;
}
.verification-item {
    width: 100%;
    margin: 8px 0px;
}
.verification-item .verification-item-left.email {
    background: url("{{asset('public/images/Screenshot5.png')}}") no-repeat center left;
    background-size: 25px 25px;
}
.verification-item .verification-item-left {
    float: left;
    box-sizing: border-box;
    padding-left: 35px;
}
.verification-item .verification-item-right {
    float: right;
    text-align: right;
}
.semi-strong {
    font-weight: 600 !important;
}
.verification-item .verification-item-right.verified {
    color: #05AC09;
    font-weight: 600;
}
.verification-item .verification-item-left {
    float: left;
    box-sizing: border-box;
    padding-left: 35px;
}
.text-small, .verification-item, textarea, body, html {
    font-size: 15px;
    line-height: 20px;
}
.verification-item .verification-item-left.phone {
    background: url("{{ asset('public/images/Screenshot.png') }}"); no-repeat center left;
    background-size: 25px 25px;
    background-repeat: no-repeat;
}
.verification-item .verification-item-left {
    float: left;
    box-sizing: border-box;
    padding-left: 35px;
}
#user1 .user-stat-icon.driven {
    background: url("{{asset('public/images/Screenshot3.png')}}") no-repeat center center;
    background-size: 20px 20px;
}
#user1 .user-stat-icon.driven.img-change {
    background: url("{{asset('public/images/Screenshot4.png')}}") no-repeat center center;
    background-size: 20px 20px;
}
#user1 .user-stat-icon {
    width: 25px;
    height: 25px;
    margin-bottom: 5px;
    display: inline-block;
    text-align: center;
}
#user1 .user-stat-number {
    font-size: 20px;
    font-weight: 700;
    color: #333333;
}
#user1 .user-stat-text {
    color: #777777;
    font-weight: 500;
    font-size: 16px;
}
#user3 .user-container {
    padding: 15px 30px;
}
.align-center {
    text-align: center !important;
}
#user3 .user-right .user-description {
    padding: 20px 0px 15px;
}
#user3 .user-right .user-description-long.active {
    display: block;
}
#user3 p{
    font-size: 18px;
    line-height: 26px;
    color: #4C4C4C;
    font-weight: 400;
}

#user4 .user-container {
    padding: 15px 30px;
}
#user4{
    border: 1px solid #dfdbdb;
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
}
.user-ratings .user-ratings-summary {
    padding: 20px;
}
.user-ratings .user-ratings-summary.driver .user-ratings-average .user-ratings-average-number {
    font-size: 34px;
    margin: 0px 0px 10px;
    font-weight: 600;
    background: url("{{asset('public/images/star.png')}}") no-repeat left top -3px;
    background-size: 27px 27px;
    padding-left: 33px;
    line-height: 25px;
}
.user-ratings .user-ratings-summary.driver .user-ratings-average .user-ratings-average-text {
    font-size: 16px;
    font-weight: 600;
}
.user-ratings .user-ratings-summary.driver .user-ratings-average .user-ratings-average-text {
    font-size: 16px;
    font-weight: 600;
}
li{
    list-style: none;
}
ul{
    margin: 0;
    padding: 0;
}
a{
    text-decoration: none;
}
ul.d-flex.star-color li i {
    color: #fecc05;
}
.d-flex.star-color li:nth-child(6) {
    color: #4C4C4C;
    font-weight: 400;
    padding-left: 10px;
    font-size: 15px;
    line-height: 20px;
  }
  .reviews-list {
    padding: 20px;
}
.semi-strong {
    font-weight: 600 !important;
}
.reviews-list .review-item .review-item-picture {
    width: 50px;
    height: 50px;
    display: block;
    border-radius: 50px;
    border: 1px solid #dfdbdb;
    float: left;
}
.clickable {
    cursor: pointer;
}
.reviews-list .review-item .review-item-contents {
    float: left;
    margin-left: 10px;
    width: 80%;
}
.reviews-list .review-item .review-item-contents .review-item-trip-details {
    color: #333333;
    font-weight: 600;
    margin: 3px 0px 3px;
}
.reviews-list .review-item .review-item-contents .review-item-author .review-item-author-name {
    float: left;
}
.reviews-list .review-item .review-item-contents .review-item-author a {
    font-weight: 700;
    color: #333333;
}
.review-item-text p{
    color: #777777;
    margin-bottom: 25px !important;
}
}
.review-item-author-role span{
        color: #777777;
}
.capitalize {
    text-transform: capitalize;
}
.pl-4{
    padding-left: 30px;
}
#usertabs button#pills-home-tab {
    border: none;
    background: none;
    color: #000;
}
#usertabs button#pills-profile-tab {
    border: none;
    background: none;
    color: #000;
}
#usertabs .nav-pills .nav-link.active, #usertabs .nav-pills .show>.nav-link {
    color: #000;
    font-weight: 600;
}
.review-item-author-name.font-sixe{
    color: #0099ff !important;
    font-weight: 700;
    margin-top: 3px;
    margin-bottom: 0px;
    font-size: 18px;
}
.user-image-text span{
    margin-top: -3px;
    color: #666;
    font-size: 16px !important;
    line-height: 24px;
}
@media(max-width:767px){
    #flex{
        display: flex;
    }
    #user img.images-circle {
        width: 130px;
        height: 130px;
        border-radius: 50%;
    }
}

.user_image
{
    display: block;
    max-width: 300px;
}

</style>
<section>
        <div class="container pt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="user-account" id="user">
                    <div class="text-image">
                        <div class="position-relative img-circle">
                              <a href="{{asset('account')}}">
        @if(Auth::user()->img != null || '')
        <img src="{{asset('public/'.Auth::user()->img)}}" alt="" class="images-circle">
        @else
        <img src="{{asset('public/upload/no.jpg')}}" alt="" class="images-circle">
        @endif
        </a>
                        </div>
                        <h1>{{ Auth::user()->name }}</h1>
                        <?php use Carbon\Carbon; ?>
                        <h6>Joined {{ Carbon::parse(Auth::user()->created_at)->format('F Y') }}</h6>
                        <p>{{ Auth::user()->gender }}, 
             @if(Auth::user()->gender)
             @php
             $birthdate = Carbon::parse(Auth::user()->dob);
             $age = $birthdate->diffInYears(Carbon::now());
             @endphp
             {{ $age }} years old
             @endif</p>
                    </div>
                    <div class="divider light"></div>
                    <br />
                    <div class="text-medium strong float-left black">Verifications</div>
                    <br /><br />
                    <div class="verification-item">
                        <div class="verification-item-left email Community">
                            <span class="semi-strong">Community agreement</span>
                        </div>
                        <div class="verification-item-right verifiagreementSigneded">Signed</div>
                    </div>
                    <br>
                    <div class="verification-item">
                        <div class="verification-item-left email">
                            <span class="semi-strong">Email address <a href="{{asset('account/email')}}"
                                    style="text-decoration: underline;" class="edit-class">Edit</a></span>
                        </div>
                        <div class="verification-item-right verified">Verified</div>
                    </div>
                    <br />
                    <div class="verification-item">
                        <div class="verification-item-left phone">
                            <span class="semi-strong">Phone number <a href="{{asset('account')}}" style="text-decoration: underline;" class="edit-class">
                                    Edit</a></span>
                        </div>
                        <div class="verification-item-right verified">Verified</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="user-leftside" id="user1">
                    <div id="user3" class="mt-5">
                        <div class="user-container text-slarge align-center">
                            <div class="user-description">
                                <div class="user-description-long active" id="user5">
                                    <p>
                                        "{{Auth::user()->description}}"</p>
                                    <!-- <a href="#" class="read-btn">Read more</a> -->
                                    <br>
                                    <br><br>
                                    <!--<a class="update-description edit-description " data-bs-toggle="modal"  data-bs-target="#exampleModal">Edit description</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 @php
              $current_date = date('Y-m-d');
              $upcoming_trips = DB::table('post_trips')
              ->where('start_date', '>=', $current_date)
              ->where('user_id',Auth::user()->id)
              ->orderBy('start_date', 'asc')
              ->get();
           $past_trips = DB::table('post_trips')
          ->where('start_date', '<', $current_date)
          ->where('user_id',Auth::user()->id)
          ->orderBy('start_date', 'desc')
          ->get();
         // dd($past_trips);
           @endphp
                <div class="tabs-user mt-5" id="usertabs">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Upcoming Trips ({{ (count($upcoming_trips))}})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Recent Trips ({{ (count($past_trips))}})</button>
                        </li>
                    </ul>
                    <div id="user4">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                @foreach($upcoming_trips as $arr)
                                <div class="reviews-list">
                                  
                                    <div class="review-item">
                                        <a class="review-item-picture clickable"
                                            style="background:url('{{asset("public/".Auth::user()->img)}}') center center no-repeat; background-size:cover;"
                                            href="/user/u_pojAost1xMdx5WWkuX978GEU"></a>
                                        <div class="row align-items-center">
                                            <div class="col-sm-9">
                                                <div class="user-image-text">
                                                    <div class="review-item-author">
                                                        <a href="/user/u_pojAost1xMdx5WWkuX978GEU"
                                                            class="capitalize link-grey review-item-author-name font-sixe">{{ $arr->origin. ' to ' .$arr->destination}}</a>
                                                    </div>
                                                    <div>
                                                        <a class="review-item-trip-details"
                                                            href="/trips/whistler-bc/squamish-bc/2939822">
                                                            <span>{{\Carbon\Carbon::parse($arr->start_date)->format('l , F d \a\t ')}} {{\Carbon\Carbon::parse($arr->start_time)->format('H:i')}}</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>${{ $arr->pricing }} per seat</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                             @endforeach
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                @foreach($past_trips as $arr)
                                <div class="reviews-list">
                                    <div class="review-item">
                                        <a class="review-item-picture clickable"
                                            style="background:url('{{asset("public/".Auth::user()->img)}}') center center no-repeat; background-size:cover;"
                                            href="/user/u_pojAost1xMdx5WWkuX978GEU"></a>
                                        <div class="row align-items-center">
                                            <div class="col-sm-9">
                                                <div class="user-image-text">
                                                    <div class="review-item-author">
                                                        <a href="/user/u_pojAost1xMdx5WWkuX978GEU"
                                                            class="capitalize link-grey review-item-author-name font-sixe">{{ $arr->origin. ' to ' .$arr->destination}}</a>
                                                    </div>
                                                    <div>
                                                        <a class="review-item-trip-details"
                                                            href="/trips/whistler-bc/squamish-bc/2939822">
                                                            <span>{{\Carbon\Carbon::parse($arr->start_date)->format('l , F d \a\t ')}} {{\Carbon\Carbon::parse($arr->start_time)->format('H:i')}}</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>${{ $arr->pricing }} per seat</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade popup-user-profile" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Description</strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="edit-code">
                        <h6>Tips on what to include in your description:</h6>
                        <ul class="mb-3">
                            <li>- Places you've traveled to</li>
                            <li> - The kind of music you like to listen to when in a car</li>
                            <li>- What you're into: concerts, sports, coffee, etc</li>
                        </ul>
                        <div class="textarea-value">
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    value="djhqd"></textarea>
                            </div>
                            <p>Maximum 1,000 characters.</p>
                        </div>
                        <div class="">
                            <button type="button" class="darkgrey-btn">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection