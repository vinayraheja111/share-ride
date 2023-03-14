<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\VehicleModel;
use App\Models\PostTrip;
use App\Models\User;
use Auth;
use App\Models\Notification;
use App\Models\TripPayment;
use App\Models\ChatMessage;
use Stripe\Stripe;
use Session;
use Stripe\Customer;
use Stripe\Token;
use Stripe\Charge;
use DB;
use Mail;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BookTripController extends Controller
{
  public function index($id)
  {
    $trip =    PostTrip::where('id', $id)->get();
    return view('booking', ['trips' => $trip]);
  }

  public function booking($id)
  {
    $trip = PostTrip::where('id', $id)->first();
     return view('book-trip', compact('trip'));
  }
  public function getseatprice(Request $request)
  {
    $trip = PostTrip::find($request->seats);
    $seat = $trip->seats;
    $price = $trip->pricing;
    $total_price = $price * $seat;
    return response()->json(['total_price' => $total_price]);
  }

  public function save_booking(Request $request)
  {
    try {
      //return $request->all();
      Stripe::setApiKey(env('STRIPE_SECRET'));
      $amount = $request->price * 100;
      $customer = Customer::create([
        'name' => Auth::user()->name,
        'email' => Auth::user()->email
      ]);
      
      $token = \Stripe\Token::create([
        'card' => [
          'name' => request('cardholder_name'),
          'number' => request('card_number'),
          'exp_month' => request('exp_month'),
          'exp_year' => request('exp_year'),
          'cvc' => request('cvc')
        ],
      ]);
      $customer->sources->create(['source' => $token->id]);

      $charge = Charge::create([
        'amount' => $amount,
        'currency' => 'usd',
        'customer' => $customer->id,
        'source' => $customer->default_source
      ]);


      if ($charge) {
        $booking = new Booking();
        $booking->trip_id = $request->trip_id;
        $booking->seats = $request->seat;
        $booking->amount = $request->price;
        $booking->message   = $request->message;
        $booking->origin   = "mohali";
        $booking->destination   = $request->session()->get('destination');
        $booking->posted_by = $request->user_id;
        $booking->applied_by   = Auth::user()->id;
        $booking->save();
        $request->session()->forget('origin');
        $request->session()->forget('destinatiHelpon');
        // $request->session()->put('booking', $booking);
        
        $bookings = new TripPayment();
        $bookings->booking_id = $booking->id;
        $bookings->user_id = Auth::user()->id;
        $bookings->amount = $request->price;
        $bookings->transaction_id = $charge->id;
        $bookings->payment_method   = $charge->status;
        $bookings->save();

        $notify = new Notification();
        $notify->trip_id = $request->trip_id;
        $notify->notify_by  = Auth::user()->id;
        $notify->notify_to   = $request->user_id;
        $notify->booking_id   = $booking->id;
        $notify->notification_type   = 'Booking';
        $notify->notification_desc = $request->message;
        $notify->save();
        $notif_to = User::find($booking->applied_by);
        $serd_mail = User::find($request->user_id);

      //   if ($serd_mail->email_notification == 'true') {
      //     $data = [
      //         'email' => $serd_mail->email,
      //         'name' => Auth::user()->name,
      //         'origin' => $booking->origin,
      //          'seats' => $booking->seats,
      //         'destination' => $booking->destination
      //     ];
      //    // dd($data);
          
      //     Mail::send('booking-request-mail', ['data1'=>$data], function ($message) use ($data) {
      //         $message->from('demo93119@gmail.com', "Share Ride");
      //         $message->subject('Welcome to Share-ride, ' . $data['name'] . '!');
      //         $message->to($data['email']);
      //     });
      // }
        return redirect('dashboard')->withSuccess("Trip booked successfully");
      } else {
        return redirect('dashboard')->withSuccess("Trip booked unsuccessfully");
      }
    } catch (\Exception $e) {
      throw new HttpException(500, $e->getMessage());
    }
  }
  
  public function my_booking()
  {
        $booked_trips = Booking::all();
        $user_bookings =  $booked_trips->where('applied_by', Auth::user()->id);
      return view('My_booking',compact('user_bookings'));
  }
  
  public function review_profile($id)
  {
      return view('user-review');
  }
  
  public function review($id)
   {
        $average_rating = 0;
        $total_review = 0;
        $five_star_review = 0;
        $four_star_review = 0;
        $three_star_review = 0;
        $two_star_review = 0;
        $one_star_review = 0;
        $total_user_rating = 0;
        $review_content = [];

        $reviews = DB::table('review_table')->where('review_to',$id)->orderBy('id', 'desc')->get();
        //echo "<pre>";
        //print_r($reviews );
        //die;

        foreach ($reviews as $review) {
            $review_content[] = [
                'user_name' => $review->user_name,
                'user_review' => $review->user_review,
                'rating' => $review->user_rating,
                //'datetime' => date('l jS, F Y h:i:s A', $review->datetime)
            ];

            if ($review->user_rating == '5') {
                $five_star_review++;
            }

            if ($review->user_rating == '4') {
                $four_star_review++;
            }

            if ($review->user_rating == '3') {
                $three_star_review++;
            }

            if ($review->user_rating == '2') {
                $two_star_review++;
            }

            if ($review->user_rating == '1') {
                $one_star_review++;
            }

            $total_review++;

            $total_user_rating = $total_user_rating + $review->user_rating;
        }

        if ($total_review > 0) {
        $average_rating = $total_user_rating / $total_review;
        }     
        else 
        {
       $average_rating = 0;
}

        $output = [
            'average_rating' => number_format($average_rating, 1),
            'total_review' => $total_review,
            'five_star_review' => $five_star_review,
            'four_star_review' => $four_star_review,
            'three_star_review' => $three_star_review,
            'two_star_review' => $two_star_review,
            'one_star_review' => $one_star_review,
            'review_data' => $review_content
        ];
        
        $data['output'] = $output;
        return view('review',$data);
    }
      public function review_Save(Request $request)
  {
    $user_id = $request->input('user_id');
    $reviewed_user_id = Auth::id();
    $existing_review = DB::table('review_table')
                    ->where('review_by', $reviewed_user_id)
                    ->where('review_to',$user_id)
                    ->first();
     //dd($existing_review);
      if ($existing_review ) 
      {
      return "You have already rated this user.";
      }
     else
     {
             $data = [
            'user_name' =>  $request->input('user_name'),
            'review_by' =>  Auth::id(),
            'review_to' =>  $request->input('user_id'),
            'avg_rating' => $request->input('avg_rating'),
            'user_rating' => $request->input('rating_data'),
            'user_review' => $request->input('user_review'),
            
        ];

           DB::table('review_table')->insert($data);

        return "Your Review & Rating Successfully Submitted";
        
       }
     }

}
