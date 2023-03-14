<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Models\Notification;
use App\Models\PostTrip;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ChatMessageController extends Controller
{
    public function index(Request $request)
    {
        try {
            $id = $request->id;
            $trip_id = $request->trip_id;
            $singleuser = User::find($id);
            // return $singleuser;
            $singlechat = ChatMessage::where(function ($q) {
                $q->where('sender_id', Auth::user()->id)
                    ->orWhere('receiver_id', Auth::user()->id);
            })->where(function ($q) use ($singleuser) {
                $q->where('sender_id', $singleuser->id)
                    ->orWhere('receiver_id', $singleuser->id);
            })->where('trip_id',$trip_id)->get();
            $allusers = ChatMessage::select('sender_id')->where('receiver_id', '=', Auth::id())->where('trip_id',$trip_id)->distinct()->get();
            return view('chat.index', compact('allusers', 'singlechat', 'singleuser','trip_id'));
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
    public function send_message(Request $request)
    {
        //return $request->all();
        try {
            $chat = new ChatMessage();
            $chat->sender_id  = Auth::user()->id;
            $chat->receiver_id  = $request->receiver_id;
            $chat->trip_id  = $request->trip_id;
            $chat->message  = $request->message;
            $chat->save();

            $notify = new Notification();
            $notify->trip_id = $request->trip_id;
            $notify->notify_by  = Auth::user()->id;
            $notify->notify_to   = $request->receiver_id;
            $notify->notification_type   = 'Chat Message';
            $notify->notification_desc = 'New message form ' . Auth::user()->name;
            $notify->save();

            return redirect()->back()->withSuccess("Mesasge send successfully");
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
    public function receive_message(Request $request)
    {
        //return $request->all();
        try {
            $chat = new ChatMessage();
            $chat->sender_id  = Auth::user()->id;
            $chat->receiver_id  = $request->receiver_id;
            $chat->trip_id  = $request->trip_id;
            $chat->message  = $request->message;
            $chat->save();

            $notify = new Notification();
            $notify->trip_id = $request->trip_id;
            $notify->notify_by  = Auth::user()->id;
            $notify->notify_to   = $request->receiver_id;
            $notify->notification_type   = 'Chat Message';
            $notify->notification_desc = 'New message form ' . Auth::user()->name;
            $notify->save();

            return redirect()->back()->withSuccess("Mesasge send successfully");
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
