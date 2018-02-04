@extends('layouts/main')

@section('title')
  Order Confirmation
@endsection

@section('content')

    <div class="container">

    {{-- <div class="container"> --}}
        <div class="row">
            <h2 class="pull-left move-up">Order Confirmation: {{ $confirmation }} </h2>
                
            <a href="{{ url("/") }}" class="move-up btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;</a>
            {{-- <h3 class="move-up">&nbsp;
                    <button class="btn btn-primary hidden-print pull-right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print the Confirmation</button>
                </h3> --}}
            </div>
        </div>

    {{-- </div> --}}
    {{-- <img src="/assets/ARH_Logo.jpg" style="max-width:300px;" alt="ARH Logo" class="img-responsive"><br> --}}
        {!! $cartOrder !!} 

    </div> <!-- end container -->

    <div class="container">

@endsection
    <script>
        function myFunction() {
        window.print();
        }
    </script>




