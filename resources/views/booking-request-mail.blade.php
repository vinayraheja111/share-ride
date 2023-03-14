<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking request send</title>
</head>

<body>
    <div class="container" id="Emailvarify" style="padding:0px 200px ;">
        <div class="d-flex justify-content-center">
            <div class="col-sm-6">
                <img src="{{url('public/images/logo1.png')}}" alt=""  width="200px">
                <h5 class="mt-4" style="color: #000;font-weight: 500;font-size: 23px;">hi {{ $data1['name' ]}},</h5>
                <strong>
                    <h3 class="mt-3 mb-3">Booking request send !</h3>
                </strong>
                <p>I am writing to inform you that someone has booked your ride on our share ride. We are excited to provide you with a safe and comfortable ride to your destination.

                    Please find below the details of your booking:<br>
                    
                    Pick-up Location: {{ $data1['origin'] }}<br>
                    Drop-off Location: {{ $data1['destination'] }}<br>
                    Seats: {{ $data1['seats'] }} Seat<br><br>
                    
                    Thanks.</p>
            </div>
        </div>
    </div>
    
</body>
</html>