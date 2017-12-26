@extends('layouts/main')

@section('title')
  Cart
@endsection

@section('content')

    <div class="container">

        <h3 class="move-up"> {{ Auth::user()->loc_name }}  Order Confirmation: {{ $order->confirmation }} </h3>
        <a href="{{ url('/') }}" class="btn btn-primary btn-md pull-right move-up">Continue Shopping</a>
            
        {{-- @if (Cart::count() > 0) --}}
            {{-- <div style="float:right"> --}}
                {{-- <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-md pull-right move-left" value="Empty Cart">
                </form> --}}
            {{-- </div> --}}
        {{-- @endif --}}
        {{-- </h1> --}}

        {{-- @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif --}}

        {{-- @if (sizeof(Cart::content()) > 0) --}}
            <div class="row body-background">
            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>&nbsp;Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr>

                        <td class="table-image">
                            <a href="{{ url($item->options->proofPath) }}" target="_blank"><img src="/{{ $item->options->proofPath }}" style="max-width:300px;" alt="proof" class="img-responsive cart-image img-border move-right dropshadow"></a>
                        </td>
                        {{-- {!! $item->proofPath !!} --}}

                        <td><a href="{{ url('franchise', [$item->model->slug]) }}">&nbsp;{{ strip_tags($item->name) }}</a></td>

                        <td>
                        {{-- {!! Form::open(['route' => ['cart', 'method' => 'PATCH']]) !!} --}}

                        {!! Form::label('quantity', $item->qty . ' &nbsp;&nbsp;&nbsp; ', ['class' => 'quantity']) !!}
                        {{-- {!! Form::select('qty', array('Select Quantity', '100' => '100 / $50', '250' => '250 / $75', '500' => '500 / $90', '1000' => '1000 / $110'), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!} --}}
                        
                        {{-- <p>
                            <input type="hidden" name="rowId" value={{$item->rowId}}>
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="title" value="{{Cart::get($item->rowId)->options->title}}">
                            <input type="submit" class="btn btn-success btn-xs move-down" value="Update Quantity">
                        </p>
                        {!! Form::close() !!} --}}

                        <br>    
                        @if ( $item->options->specialInstructions )
                            <div class="thumbnail" style="width:275px; font-size:12px">
                                <h5 class="move-up">Special Instructions:</h5>
                                {{ $item->options->specialInstructions }} 
                            </div>
                        @endif

                        </div>

                        </td>

                        <td>${{ number_format($item->subtotal, 2) }}</td>
                        <td class=""></td>

                        {{-- <td> --}}
                        {{-- <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-xs" value="Remove">
                        </form> --}}

                        {{-- <form action="{{ route('showEdit') }}" method="POST" class="side-by-side"> --}}
                            {{-- {!! csrf_field() !!} --}}
                        {{-- {!! Form::open(['route' => ['edit', 'method' => 'POST']]) !!} --}}
                            {{-- <input type="hidden" name="_method" value="get">
                            <input type="hidden" name="rowId" value={{$item->rowId}}>
                            <input type="hidden" name="qty" value={{$item->qty}}>
                            <input type="hidden" name="price" value={{$item->price}}>
                            <input type="hidden" name="name" value="{{$item->options->name}}">
                            <input type="hidden" name="title" value="{{$item->options->title}}">
                            <input type="hidden" name="email" value="{{$item->options->email}}">
                            <input type="hidden" name="community" value="{{$item->options->community}}">
                            <input type="hidden" name="address1" value="{{$item->options->address1}}">
                            <input type="hidden" name="address2" value="{{$item->options->address2}}">
                            <input type="hidden" name="city" value="{{$item->options->city}}">
                            <input type="hidden" name="state" value="{{$item->options->state}}">
                            <input type="hidden" name="zip" value="{{$item->options->zip}}">
                            <input type="hidden" name="phone" value="{{$item->options->phone}}">
                            <input type="hidden" name="fax" value="{{$item->options->fax}}">
                            <input type="hidden" name="cell" value="{{$item->options->cell}}">
                            <input type="hidden" name="specialInstructions" value="{{$item->options->specialInstructions}}">
                            <input type="hidden" name="prod_name" value="{{ $item->options->prod_name }}">
                            {{ Session::put('prod_name', $item->options->prod_name) }}
                            <input type="hidden" name="proofPath" value="{{$item->options->proofPath}}">
                            <input type="hidden" name="prod_id" value="{{$item->options->prod_id}}">
                            <input type="submit" class="btn btn-success btn-xs move-down" value="&nbsp;&nbsp;&nbsp; Edit &nbsp;&nbsp;">
                            {!! Form::close() !!} --}}
                    </tr>
                    @endforeach

                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td style="text-align: right">${{ Cart::instance('default')->subtotal() }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">P&amp;H</td>
                        @php
                            Cart::instance('default')->subtotal() <= 250 ? $ph = 4.5 : 6.5;
                        @endphp
                        <td style="text-align: right">${{ number_format($ph, 2) }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Sales Tax (7%)</td>
                        <td style="text-align: right">${{ number_format(Cart::instance('default')->tax() + ($ph * .07), 2) }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 30px;"></td>
                        <td class="small-caps table-bg" style="text-align: right"><strong>*Your Total</strong></td>
                        <td class="table-bg" style="text-align: right">${{ number_format(Cart::total() + $ph + ($ph * .07), 2) }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

    <div class="col-sm-12 col-md-12 col-lg-12">
    {{-- <br> --}}
        <div class="thumbnail">
            {{-- <img style='border:1px solid #000000' src="assets/franchise/Photo Sales Rep BC - 60 Yr. Logo.jpg" class="img-responsive" alt="..."> --}}
            <div class="caption">

                <h4 class='move-up'>This order will be shipped to:</h4>
                     <strong>{{ Auth::user()->loc_name }}</strong><br>
                     Attn: {{ Auth::user()->contact_s }}<br>
                     {{ Auth::user()->address1_s }}<br>
                     {{ Auth::user()->address2_s }}<br>
                     {{ Auth::user()->city_s }}, {{ Auth::user()->state_s }} {{ Auth::user()->zip_s }}<br><br>

                {{-- <form action="{{ route('cartorder') }}" method="POST">
                    <p class="description text-muted">
                        <input type="checkbox" name="confirm" >&nbsp;&nbsp;I have reviewed the Proof(s) and/or the data of my cart item(s) and confirm that it is correct. Unless I have specifically instructed to the contrary, I understand that production will commence upon submission, products without an online proofing option excluded.  
                    </p> --}}
                    <p><small>*UPS charges will be computed and added to your total upon shipping.</small></p>
                
{{-- <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Proof&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
    </div>
    <div class="col-xs-4">
      <a href="{{ url('/categories/' . session('catId')) }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div> --}}  
{{-- <br> --}}
                {{-- <div class="col-md-5 offset-md-4"> --}}
                    
                        {{-- {!! csrf_field() !!} --}}
                        {{-- <input type="hidden" name="_method" value="POST"> --}}
                        {{-- <input type="submit" class="btn btn-success col-md-5 offset-md-4 pull-left" value="Yes, Place my Order">
                    </form> --}}
                {{-- </div> --}}
                
                    {{-- <a href="{{view('cart/cartOrder')}}" class="col-md-5 offset-md-4 btn btn-success" role="button"> Yes, Place my Order </a> --}}
                    {{-- &nbsp;
                    <a href="/cart" class="col-md-5 offset-md-4 btn btn-danger pull-right" role="button"> No, Return to my Cart </a>
                </p> --}}
            </div>    
        </div>
    </div>

    </div>
        </div> <!-- end container -->   
            
        {{-- @else
            <div class="row body-background">
                <div class="container">
                    <div class="row">
                        <h3 class="text-center">You have no items in your shopping cart</h3>
                    </div>
                </div>
            </div>  
        @endif --}}

        <div class="spacer"></div>

    </div> <!-- end container -->

<div class="container">

@endsection
{{-- @foreach ($orders as $order)
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="list-group">
                 @foreach ($order->cart->items as $item)
                      <li class="list-group-item">
                          
                      </li>
                 @endforeach
            </ul>
        </div>
    </div>
@endforeach --}}
{{-- <br>
{!! $order->payment_id !!} --}}


