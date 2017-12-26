<!DOCTYPE html>
{{-- <html>
<head>
    <title>
        My Orders
    </title>
    <br>
    @include('partials/_head')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> --}}

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> --}}
{{-- </head>

<body> --}}

  @extends('layouts/main')

@section('title')
   My Orders
@endsection

@section('content')
   
    {{-- <div class="container">
        <div class="row">
            @include('partials/_navbar')
        </div>
    </div> --}}

<div class="container">
  <div class="row">
    <h2 class="pull-left move-up"> My Orders </h2>
    <a href="{{ url("/") }}" class="btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;</a>
  </div>
{{-- </div> --}}
     
 {{-- <div class="container"> --}}
<div class="row body-background">
<br>

    {{-- <table id="example" class="display" cellspacing="0" width="100%"> --}}
    {{-- <table id="example" class="table table-striped table-bordered"> --}}
    <div class="container">
    <table id="myorders-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>
      <tr>
        <th>Date</th>
        <th>Location</th>
        <th>Location Name</th>
        <th>Confirmation</th>
        <th>Cart</th>
      </tr>
    </thead>

    <tbody>
        @if (!$orders->count())
            <h3 class="text-center move-up">There are no orders to display</h1> <br>
        @endif
        
        @foreach ($orders as $order)
            <tr>
            {!! Form::open(['route' => 'showConfirmedOrder', 'method' => 'POST']) !!}
            {!! Form::hidden('confirm', $order->confirmation) !!}
            {{-- {!! Form::hidden('cart', $order->cart) !!} --}}

             <td>{{ $order->created_at->format('m/d/Y h:i A') }}</td>
             <td>{{ $order->user->loc_num }}</td>
             <td>{{ $order->name }}</td>
             {{-- <td>{{ $order->confirmation }}</td> --}}
             
             <td>{!! Form::submit($order->confirmation, ['class' => 'btn btn-default move-up']) !!}</td>
            <td>{{ $order->cart }}</td>
             {!! Form::close() !!}
            </tr>
        @endforeach
    </tbody>
    </table>

    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

{{-- </div> --}}
    @endsection
{{-- </div> --}}
   {{-- @include('partials/_footer')
</div>
</body>
</html> --}}
