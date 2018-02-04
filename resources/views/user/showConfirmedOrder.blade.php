@extends('layouts/main')

@section('title')
  Order {{ $showOrder }}
@endsection

<style>
    @media print {
        a[href]:after {
            visibility: hidden;
        }
    }
</style>

@section('content')

<div class="container">
    <div class="row">
      <h2 class="pull-left move-up"> Order Confirmation: {{ $showOrder }} </h2>
      <a href="{{ route("myorders")}}" class="btn btn-primary pull-right move-up" role="button">Return to "My Orders" Page</a>
      {{-- <button class="btn btn-primary hidden-print pull-right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print the Confirmation</button> --}}
    </div>
</div>

{!! $confirmEmail->cart !!}

@endsection

<script>
    function myFunction() {
        window.print();
    }
</script>