@extends('layouts/main')

@section('title')
  Order Confirmation
@endsection

@section('content')

    <div class="container">

    {{-- <div class="container"> --}}
        <div class="row">
            <h2 class="pull-left move-up">Order Confirmation: {{ $confirmation }} &nbsp;&nbsp;&nbsp; </h2>
              
            <a href="{{ url("/") }}" class="move-up btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <h3 class="move-up"> &nbsp;
                    <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Print the Confirmation&nbsp;&nbsp;&nbsp;</button>
                </h3>
            </div>
        </div>

{{-- Begin html test --}}

{{-- <div class="container">
    <div class="row body-background">
        <br>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <img src="https://hkorderportal.com/assets/HKheader2.png" style="max-width:500px;" alt="HK Logo" class="img-responsive move-right move-down">
            <br>
            <div class="thumbnail">
                <div class="caption">
                    <h3 class="move-up">Order Confirmation Receipt
                        <button class="btn btn-primary hidden-print pull-right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp; Print the Confirmation</button>
                    </h3>
                    
                    <p> <strong>HK {{ Auth::user()->loc_num }} &nbsp;&nbsp;&nbsp; {{ Auth::user()->loc_name }} &nbsp;&nbsp;&nbsp; {{ date("m/d/Y") }} &nbsp;&nbsp;&nbsp; Confirmation: {{ $confirmation }} </strong></p>
                    
                    <h5 class="move-up">Thank You. Your order has been placed. This confirmation has been emailed to admin: {{ Auth::user()->contact_a }} ( <a href="mailto:{{ Auth::user()->email }} ">{{ Auth::user()->email }}</a> ).</h5>
                   
                    <h5 class="move-up">Your order will be shipped to:</h5>
                    
                    <strong> {{ Auth::user()->loc_name }}</strong>
                    <br>
                    {{  $address_s }}
                    <p><small>Most orders ship within 2-3 working days. <br> Please allow 1-2 weeks for engraved Partner Cards.</small></p>
                    
                    <p class="move-down"></p>

                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="table-image"></th>
                    <th>&nbsp;Product</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {!! $orderItems !!}
            </tbody>
        </table>
    </div>












 --}}

{{-- End html test --}}

        {!! $cartOrder !!}    {{-- from CartOrderController --}}

</div> <!-- end container -->

<div class="container">

@endsection
    <script>
        function myFunction() {
        window.print();
        }
    </script>




