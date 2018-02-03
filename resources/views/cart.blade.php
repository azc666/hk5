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
                        <td class="table-image">
                            <a href="{{ url(substr_replace($item->options->proofPath, 'pdf', -3)) }}" target="_blank"><img src="{{ $item->options->proofPath }}" style="max-width:300px;" alt="proof" class="img-responsive cart-image move-right dropshadow"></a>
                        </td>

                        <td>
                            <strong>{{ strip_tags($item->name) }}</strong>
                            <br>{!! $item->options->name !!} 
                            <br>{!! $item->options->email !!} 
                            <br><br>
                             <div class="text-muted move-up">
                                {!! nl2br($item->options->prod_description) !!} 
                             </div>                         
                        </td>   

                        <td>
                        {!! Form::open(['route' => ['cart', 'method' => 'PATCH']]) !!}
                        
                        @if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC')
                            {!! Form::select('qty', array('Select Quantity', '250' => '250', '500' => '500'), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                        @endif
                        
                        @if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI')  
                            {!! Form::select('qty', array('Select Quantity', '4' => '4 Pads', '8' => '8 Pads'), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                        @endif

                        @if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI')  
                            {!! Form::select('qty', array('Select Quantity', '24' => '250 BCs + 4 Pads', '28' => '250 BCs + 8 Pads', '54' => '500 BCs + 4 Pads', '58' => '500 BCs + 8 Pads',), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                        @endif
                        
                        &nbsp;&nbsp;
                        
                        @php    
                            $bcfyi_qty = $item->qty;
                            if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
                                switch ($item->qty) {
                                    case '24': $bcfyi_qty = '250 BCs + 4 FYI Pads'; break;
                                    case '28': $bcfyi_qty = '250 BCs + 8 FYI Pads'; break;
                                    case '54': $bcfyi_qty = '500 BCs + 4 FYI Pads'; break;
                                    case '58': $bcfyi_qty = '500 BCs + 8 FYI Pads'; break;
                                    default: $bcfyi_qty = '250 BCs + 4 FYI Pads'; 
                                }
                            } 
                            if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
                                switch ($item->qty) {
                                    case '4': $bcfyi_qty = '4 FYI Pads'; break;
                                    case '8': $bcfyi_qty = '8 FYI Pads'; break;
                                    default: $bcfyi_qty = '4 FYI Pads'; 
                                }
                            }
                            if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC') {
                                switch ($item->qty) {
                                    case '250': $bcfyi_qty = '250 Business Cards'; break;
                                    case '500': $bcfyi_qty = '500 Business Cards'; break;
                                    default: $bcfyi_qty = '250 Business Cards'; 
                                }
                            }
                        @endphp

                        {!! Form::label('quantity', $bcfyi_qty, ['class' => 'quantity']) !!}
                        
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


