@extends('rides.layouts.app')
@section('title','Dashboard')
@section('content')
 <section class="dash-details">
        <div class="container">
                    <div class="page-details">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="mb-5">Payments</h1>
                            </div>
                            <div class="col-sm-6 text-lg-end">
                                <p style="text-decoration:underline ;color: #777777;"> <a href="{{url('payment-setting')}}"><b>Payment settings </b></a> | <a href="#"><b>Payments help</b></a> </p>
                            </div>
                        </div>
                        <div class="row" id="payment">
                            <div class="col-sm-2">
                                <select class="form-select" aria-label="Default select example">
                                  <option select>@php $currentYear = date('Y'); echo $currentYear; @endphp</option>
                                                 
                                </select>
                              </div>
                              <div class="col-sm-2">
                                <select class="form-select" aria-label="Default select example" name="from_month">
                                  <?php
    $months = range(1, 12);

    foreach ($months as $month) {
        $monthName = date("F", mktime(0, 0, 0, $month, 1));
        $monthValue = str_pad($month, 2, '0', STR_PAD_LEFT);
        echo '<option value="' . $monthValue . '">' . $monthName . '</option>';
    }
    ?>
                                 
                                </select>
                              </div>
                              <div class="col-sm-2">
                                <select class="form-select" aria-label="Default select example" name="to_month">
                                  <?php
    $months = range(1, 12);

    foreach ($months as $month) {
        $monthName = date("F", mktime(0, 0, 0, $month, 1));
        $monthValue = str_pad($month, 2, '0', STR_PAD_LEFT);
        echo '<option value="' . $monthValue . '">' . $monthName . '</option>';
    }
    ?>
                                </select>
                              </div>
                        </div>
                        <p class="mt-5">No payments for this period.</p>
                    </div>
                </div>
    </section>

@endsection
