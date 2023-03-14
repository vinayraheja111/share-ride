@extends('rides.layouts.app')
@section('title','Chat Message')
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
<div class="container">
    <div class="show-all">
        <div class="row">
            @php 
             $trip = App\Models\PostTrip::where('user_id',Auth::user()->id)->first();
            @endphp
            @foreach($allusers as $value)
            @php
            $users = App\Models\User::where('id',$value->sender_id)->first();
            $count = DB::table('chat_messages')->where(['sender_id'=>$value->sender_id,'status'=>'unread'])->count();
            $allusers = DB::table('chat_messages')->where('receiver_id', '=', Auth::user()->id)->where('sender_id',$value->sender_id)->update([
                'status' => 'read'
            ]);
            @endphp
            <div class="col-md-1">
               <a href="{{url('chat-view',$users->id)}}"> <div class="mt-5">
                    <img src="{{asset('public/'.$users->img)}}" id="profile_img">
                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">{{$count}}</span>
                    <p class="text-center">{{$users->name}}</p>
                </div></a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="text-center">
        <img src="{{asset('public/'.$singleuser->img)}}" alt="" class="img-center">
        <!-- <img src="http://localhost/arjun/share-ride/public/images/user.jpg" alt="" class="img-center"> -->
        <h6>{{$singleuser->name}} wrote this trip description:
            <div class="message-contents mt-4">
                <div class="message-bubble">
                    <pre class="m-0">It is a long established fact...</pre>
                </div>
            </div>
            @if($singlechat)
            @foreach($singlechat as $message)
            @php 
            $users = DB::table('users')->where('id',$message->sender_id)->first();
            @endphp
            <div class="message mt-4">
                <div class="message-time align-center">
                    <span>{{ now()->format('M-d \a\t H:i') }}</span>
                </div>
                @if($message->sender_id != Auth::user()->id)
                <div class="message-container author" id="msg-chat">
                    <div class="message-picture">
                        <div class="profile-pic">
                            <img src="{{asset('public/'.$singleuser->img)}}">
                        </div>
                    </div>
                    <div class="message-contents">
                        <div class="message-bubble">
                            <pre class="m-0">{{$message->message}}</pre>
                        </div>
                    </div>
                </div>
                @else
                <div class="message-container author">
                    <div class="message-picture">
                        <div class="profile-pic">
                            <img src="{{asset('public/'.$users->img)}}">
                        </div>
                    </div>
                    <div class="message-contents">
                        <div class="message-bubble">
                            <pre class="m-0">{{$message->message}}</pre>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
            @endif
            <div class="info-msg text-medium no-margin">
                <p> book online, cash isn't allowed. <a href="#" style="text-decoration: underline;color: #333333;">Why?</a></p>
            </div>
            <form method="post" action="{{url('receive-message')}}"  class="message-form-row">
                @csrf
                <div class="message-content" placeholder="Message to Vinay" submit-form="tripmessageform">
                    <input type="hidden" name="receiver_id" value="{{$singleuser->id}}">
                    <input type="hidden" name="trip_id" value="{{$trip->id ?? ''}}">
                    <textarea name="message" cols="40" rows="10" maxlength="1024" required="" id="id_content" placeholder="Message to {{$singleuser->name}}"></textarea>
                    <div class="clear"></div>
                    <div class="xs-spacer"></div>
                    <div class="button-loader button-loader-message">
                        <input type="submit" value="Send" submitted-value="&nbsp;" class="message-send-button">
                    </div>
                </div>
            </form>
        </h6>
    </div>
</div>

@endsection