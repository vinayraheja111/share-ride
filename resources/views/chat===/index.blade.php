@extends('rides.layouts.app')
@section('title','Chat Messages')
@section('content')

<style>
    img#profile_img {
        width: 65px;
        height: 65px;
        border-radius: 50px;
    }

    div#msg-chat {
        flex-direction: unset;
    }
</style>
<div class="container" id="post-send">
    <div class="text-center">
       
        <img src="{{asset('public/upload/no.jpg')}}" alt="" class="img-center">
      
        <img src="{{asset('public/images/user.jpg')}}" alt="" class="img-center">
        <h6>Vinay wrote this trip description:</strong>
            <div class="message-contents mt-4">
                <div class="message-bubble">
                    <pre class="m-0"></pre>
                </div>
            </div>
            <div class="message mt-4">
                <div class="message-time align-center">
                    <span>Feb-6 at 6:06 pm</span>
                </div>
                <div class="message-container author">
                    <div class="message-picture">
                        <div class="profile-pic">
                            <img src="{{asset('public/images/1.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="message-contents">
                        <div class="message-bubble">
                            <pre class="m-0">dfgdfgdgdgddgdgdgdgdgdgdg</pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-msg text-medium no-margin">
                <p> book online, cash isn't allowed. <a href="#" style="text-decoration: underline;color: #333333;">Why?</a></p>
            </div>
            <form action="" class="message-form-row">
                <div class="message-content" placeholder="Message to Vinay" submit-form="tripmessageform">
                    <textarea name="content" cols="40" rows="10" maxlength="1024" required="" id="id_content" placeholder="Message to Vinay"></textarea>
                    <div class="clear"></div>
                    <div class="xs-spacer"></div>
                    <div class="button-loader button-loader-message">
                        <input type="submit" value="Send" submitted-value="&nbsp;" class="message-send-button">
                    </div>
                </div>
            </form>
    </div>
</div>

@endsection