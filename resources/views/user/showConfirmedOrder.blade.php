@extends('layouts/main')

@section('title')
  Order {{ $showOrder }}
@endsection

@section('content')
    {{-- hello world with confirmed order <br> --}}
    {{-- {!! $orders->name->all() !!} <br> --}}
    {{-- {!! Auth::user()->loc_name !!} <br> --}}
<div class="container">
    <div class="row">
      <h2 class="pull-left move-up"> Order Confirmation: {{ $showOrder }} </h2>
      <a href="{{ route("myorders")}}" class="btn btn-primary pull-right move-up" role="button">Return to "My Orders" Page</a>
    </div>
</div>

{!! $confirmEmail->cart !!}

@endsection