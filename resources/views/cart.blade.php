@extends('layouts/main')

@section('title')
  My Cart
@endsection

@section('content')

    <div class="container">

        <h1 class="move-up">My Cart
        <a href="{{ url('/') }}" class="btn btn-primary btn-md pull-right move-up">Continue Shopping</a>
            
        @if (Cart::count() > 0)
            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-md pull-right move-left" value="Empty Cart">
                </form>
            </div>
        @endif
        </h1>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if (sizeof(Cart::content()) > 0)
            <div class="row body-background">
            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>&nbsp;Product</th>
                        <th>Quantity</th>
                        {{-- <th>Price</th> --}}
                        {{-- <th class="column-spacer"></th> --}}
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                        @php
                            $prod_layout = $item->options->prod_layout;
                        @endphp
                        <tr>
                            {{-- @if ($prod_layout == 'opbcl' || $prod_layout == 'opbco' || $prod_layout == 'opbmo' || $prod_layout == 'opbsu')
                                <td class="table-image">
                                    <a href="{{ url(substr_replace($item->options->proofPath, 'pdf', -3)) }}" target="_blank"><img src="{{ $item->options->imagePath }}" style="max-width:300px;" alt="proof" class="img-responsive cart-image move-right dropshadow"></a>
                                </td>
                            @else --}}
                                <td class="table-image">
                                    <a href="{{ url(substr_replace($item->options->proofPath, 'pdf', -3)) }}" target="_blank"><img src="{{ $item->options->proofPath }}" style="max-width:300px;" alt="proof" class="img-responsive cart-image move-right dropshadow"></a>
                                </td>
                            {{-- @endif --}}

                            <td>
                                {{ strip_tags($item->name) }}
                                <br><br>
                                 <div class="text-muted move-up">
                                    {!! nl2br($item->options->prod_description) !!} 
                                 </div>                         
                            </td>   

                            <td>
                            {!! Form::open(['route' => ['cart', 'method' => 'PATCH']]) !!}

                           

                            {{-- @if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI')
                                {!! Form::label('quantity', $item->qty . ' Pads&nbsp;&nbsp;&nbsp; ', ['class' => 'quantity']) !!}
                            @else --}}
                                {!! Form::label('quantity', $item->qty . ' &nbsp;&nbsp;&nbsp; ', ['class' => 'quantity']) !!}
                            {{-- @endif --}}
                        

                        @if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC')
                            {!! Form::select('qty', array('Select Quantity', '100' => '100', '250' => '250', '500' => '500'), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                        @endif
                        
                        @if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI')  
                            {!! Form::select('qty', array('Select Quantity', '4' => '4 Pads', '8' => '8 Pads'), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                        @endif

                        
                        
                        <p>
                            {{-- {!! Form::hidden('rowId', $item->rowId) !!} --}}
                            {{-- {{ $rowId = $item->rowId }} --}}
                            <input type="hidden" name="rowId" value={{$item->rowId}}>
                            <input type="hidden" name="prod" value={{$item->options->prod_name}}>
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="title" value="{{Cart::get($item->rowId)->options->title}}">
                            <input type="hidden" name="prod_id" value="{{$item->options->prod_id}}">
                            <input type="hidden" name="prod_layout" value="{{$item->options->prod_layout}}">
                            <input type="submit" class="btn btn-success btn-xs move-down" value="Update Quantity">
                        </p>
                        {!! Form::close() !!}

                        <br>    
                        @if ( $item->options->specialInstructions )
                            <div class="thumbnail" style="width:275px; font-size:12px">
                                <h5 class="move-up">Special Instructions:</h5>
                                {{ $item->options->specialInstructions }} 
                            </div>
                        @endif

                        <div> {{-- display variable items  --}}
                            {{-- rowId: {{ $item->rowId }} <br>
                            qty: {{ $item->qty }} <br>
                            name: {{ $item->options->name }} <br>
                            title: {{ $item->options->title }} <br>
                            community: {{ $item->options->community }} <br>
                            email: {{ $item->options->email }} <br>
                            address1: {{ $item->options->address1 }} <br>
                            address2: {{ $item->options->address2 }} <br>
                            phone: {{ $item->options->phone }} <br>
                            fax: {{ $item->options->fax }} <br>
                            prod_name: {{ $item->options->prod_name }}<br>
                            prod_id: {{ $item->options->prod_id }}  --}}
                            {{-- email: {{ $item->options->email }} <br> --}}
                            {{-- License: {{ $item->options->license }} --}}
                        </div>

                        </td>

                        {{-- <td>${{ number_format($item->subtotal, 2) }}</td> --}}
                        {{-- <td class=""></td> --}}

                        <td>
                        <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-xs" value="Remove">
                        </form>

                        <form action="{{ route('showEdit') }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                        {{-- {!! Form::open(['route' => ['edit', 'method' => 'POST']]) !!} --}}
                            <input type="hidden" name="_method" value="get">
                            <input type="hidden" name="rowId" value={{$item->rowId}}>
                            <input type="hidden" name="qty" value={{$item->qty}}>
                            {{-- <input type="hidden" name="price" value={{$item->price}}> --}}
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
                            {{-- <input type="hidden" name="license" value="{{$item->options->license}}"> --}}
                            <input type="hidden" name="specialInstructions" value="{{$item->options->specialInstructions}}">
                            <input type="hidden" name="prod_name" value="{{ $item->options->prod_name }}">
                            {{ Session::put('prod_name', $item->options->prod_name) }}
                            <input type="hidden" name="proofPath" value="{{$item->options->proofPath}}">
                            <input type="hidden" name="prod_id" value="{{$item->options->prod_id}}">
                            <input type="hidden" name="prod_description" value="{{$item->options->prod_description}}">
                            <input type="submit" class="btn btn-success btn-xs move-down" value="&nbsp;&nbsp;&nbsp; Edit &nbsp;&nbsp;">
                            {!! Form::close() !!}
                    </tr>
                    @endforeach

                    {{-- <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td style="text-align: right">${{ Cart::instance('default')->subtotal() }}</td>
                        <td></td>
                        <td></td>
                    </tr> --}}

                    {{-- <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Packaging &amp; Handling</td>
                        @php
                            $ph = 0;
                            if (Cart::instance('default')->subtotal() <= 250) {
                                $ph = 4.5;
                            } else {
                                $ph = 6.5; 
                            }
                        @endphp
                        <td style="text-align: right">${{ number_format($ph, 2) }}</td>
                        <td></td>
                        <td></td>
                    </tr> --}}
{{-- 
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Sales Tax (7%)</td>
                        <td style="text-align: right">${{ number_format(Cart::instance('default')->tax() + ($ph * .07), 2) }}</td>
                        <td></td>
                        <td></td>
                    </tr> --}}

{{--                     <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 30px;"></td>
                        <td class="small-caps table-bg" style="text-align: right"><strong>*Your Total</strong></td>
                        <td class="table-bg" style="text-align: right">${{ number_format(Cart::total() + $ph + ($ph * .07), 2) }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr> --}}

                </tbody>
            </table>

            <a href=" {{ url('cart/cartConfirm') }} " class="btn btn-success btn-md pull-right" style="margin-right:30px">Proceed to Checkout</a>

            </div>
        </div> <!-- end container -->   
            
        @else
            <div class="row body-background">
                <div class="container">
                    <div class="row">
                        <h3 class="text-center">You have no items in your shopping cart</h3>
                    </div>
                </div>
            </div>  
        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

<div class="container">

@endsection


