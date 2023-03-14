@extends('rides.layouts.app')
@section('title','Payouts')
@section('content')

<style>
    .m-spacer {
        height: 40px;
        clear: both;
    }

    h2.pre-heading {
        font-size: 32px;
        font-weight: 800;
        color: #000;
    }

    p.pre-p {
        font-size: 20px !important;
        line-height: 24px !important;
        font-weight: 600 !important;
    }

    p.pre-p1 {
        font-size: 18px;
        line-height: 26px;
    }

    .xxs-spacer {
        height: 5px;
        clear: both;
    }

    .user-preference-group .user-preference {
        opacity: 0.4;
        text-align: center;
        font-weight: 600;
        color: #333333;
        font-size: 16px;
    }

    .user-preference-group .user-preference:hover {
        opacity: 1;
        cursor: pointer;
    }

    .user-preference.scents.no-smoking {
        background: url({{ url('public/images/smoking.png') }}) no-repeat center center;
        background-size: 100px 100px;
        width: 100%;
        float: left;
        padding-top: 120px;
    }

    .user-preference.scents.smoking {
        background: url({{ url('public/images/smoking1.png') }}) no-repeat center center;
        background-size: 100px 100px;
        width: 100%;
        float: left;
        padding-top: 120px;
    }

    .user-preference.chattiness.chattiness_low {
        background: url({{ url('public/images/chattiness.png') }}) no-repeat center center;
        background-size: 100px 100px;
        width: 100%;
        float: left;
        padding-top: 120px;
    }

    .user-preference.chattiness.chattiness_medium {
        background: url({{ url('public/images/chattiness1.png') }}) no-repeat center center;
        background-size: 100px 100px;
        width: 100%;
        float: left;
        padding-top: 120px;
    }

    .user-preference.chattiness.chattiness_high {
        background: url({{ url('public/images/chattiness2.png') }}) no-repeat center center;
        background-size: 100px 100px;
        width: 100%;
        float: left;
        padding-top: 120px;
    }
</style>

<section class="dash-details">
    <div class="container">
        <div class="row">
           @include('account.sidebar')
            <div class="col-md-8">
                <h2 class="pre-heading">Preferences</h2>
                <div class="m-spacer hide-on-mobile"></div>
                <p class="pre-p">Tell other members about your preferences</p>
                <div class="xxs-spacer hide-on-mobile"></div>
                <p class="pre-p1">This information will be displayed on your profile and your trips</p>
                <div class="m-spacer"></div>
                <div class="pre-user">
                    <form method="POST" action="{{ url('account/preferences') }}">
                        @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="user-preference-group two"  data-id="scents_ok">
                                <div class="user-preference scents no-smoking active" @if(Auth::user()->scents == 'scents_ok') style="opacity:1;"  @endif value="False">No strong scents
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="user-preference-group two"   data-id="no_scents">
                                <div class="user-preference scents smoking" @if(Auth::user()->scents == 'no_scents') style="opacity:1;"  @endif value="True">Scents OK</div>
                            </div>
                            <input type="hidden" name="scents_ok" id="id_scents_ok">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="m-spacer"></div>
                    <div class="divider light"></div>
                    <div class="s-spacer"></div>
                    <div class="user-preference-group three" data-target-input="chattiness">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="user-preference chattiness chattiness_low" @if(Auth::user()->chattiness == 'I like quiet') style="opacity:1;"  @endif data-value="I like quiet">I like quiet</div>
                            </div>
                            <div class="col-md-4">
                                <div class="user-preference chattiness chattiness_medium" @if(Auth::user()->chattiness == "I dont mind a chat") style="opacity:1;"  @endif data-value="I dont mind a chat">I don't mind a chat</div>
                            </div>
                            <div class="col-md-4">
                                <div class="user-preference chattiness chattiness_high" @if(Auth::user()->chattiness == "Im pretty chatty") style="opacity:1;"  @endif data-value="Im pretty chatty">I'm pretty chatty</div>
                            </div>
                            <input type="hidden" name="chattiness" id="id_chattiness">
                        </div>
                    </div>
                    <div class="mt-5 mb-3 ">
                 <input type="submit" value="Update preferences" class="button darkgrey" id="trip-post-button">
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
    document.querySelector('#trip-post-button').addEventListener('click', function() {
        var scents_ok_value = document.querySelector('.user-preference-group.two .user-preference.active').getAttribute('value');
        var chattiness_value = document.querySelector('.user-preference-group.three .user-preference.active').getAttribute('data-value');

        document.querySelector('#id_scents_ok').value = scents_ok_value;
        document.querySelector('#id_chattiness').value = chattiness_value;
    });
    
    
    $(".two").click(function(){
        $(this).css('opacity',1);
        var value =  $(this).attr('data-id');
        $("#id_scents_ok").val(value);
    })

    
    $(".chattiness").click(function(){
        $(this).css('opacity',1);
        var value =  $(this).attr('data-value');
        $("#id_chattiness").val(value);
    })
</script>
@endsection