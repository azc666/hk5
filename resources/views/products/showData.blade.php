<!DOCTYPE html>
<html>
<head>
    <title></title>
{!! Html::style('css/mpdfstyle.css') !!}    
</head>
<body>
    
<div class="container">
    <div class="row">

{{-- ////////////////// Business Card //////////////// --}}    
    @if ($request->id == 101 || $request->id == 102 || $request->id == 103)
        <div class="bc_background">
       
        <div class="bc_name">
            {{ $request->name }}
        </div>
        <div class="bc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="bc_address">
            Holland & Knight LLP<br>

            @if ($request->address2)
                {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} , {{ $request->state }}  {{ $request->zip }}
            @else 
                {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}  {{ $request->zip }}
            @endif

            <br>
            
            @if ($phone != null)
                {{ $phone }} <br>
            @endif    

            <strong>{{ $request->email }}</strong>
        </div>
    </div> {{-- close background class --}}
    @endif

{{-- //////////////////// FYI Pads /////////////////// --}}    
    @if ($request->id == 107 || $request->id == 108 || $request->id == 109)
    <div class="fyi_background">
       
       <div class="fyi_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>

        {{-- <div class="fyi_title">
            {!! $request->title ?: '<br>' !!}
        </div> --}}

        <div class="fyi_address_line1">
            Holland & Knight LLP
        </div>

        <div class="fyi_address_line2">
            @if ($request->address2)
                {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} , {{ $request->state }}  {{ $request->zip }}
            @else 
                {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}  {{ $request->zip }}
            @endif

            <br>
            
            @if ($phone != null)
                {{ $phone }} <br>
            @endif    

            <strong>{{ $request->email }}</strong>

        </div>
    </div>  {{-- close backgound --}}
        </div> {{-- close <div class="row"> --}}      
    @endif

    {{-- //////////////////// Combo BC FYI Pads /////////////////// --}}    
    @if ($request->id == 104 || $request->id == 105 || $request->id == 106)
    <div class="bcfyi_background">
       <div class="bcfyi_bc_name">
            {{ $request->name }}
        </div>
        <div class="bcfyi_bc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="bcfyi_bc_address">
            Holland & Knight LLP<br>
            @if ($request->address2)
                {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} , {{ $request->state }}  {{ $request->zip }}
            @else 
                {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}  {{ $request->zip }}
            @endif
            <br>            
            @if ($phone != null)
                {{ $phone }} <br>
            @endif    
            <strong>{{ $request->email }}</strong>
        </div>


       <div class="bcfyi_fyi_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>

        {{-- <div class="fyi_title">
            {!! $request->title ?: '<br>' !!}
        </div> --}}

        <div class="bcfyi_fyi_address_line1">
            Holland & Knight LLP
        </div>

        <div class="bcfyi_fyi_address_line2">
            @if ($request->address2)
                {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} , {{ $request->state }}  {{ $request->zip }}
            @else 
                {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}  {{ $request->zip }}
            @endif

            <br>
            
            @if ($phone != null)
                {{ $phone }} <br>
            @endif    

            <strong>{{ $request->email }}</strong>

        </div>
    {{-- </div> --}}  {{-- close backgound --}}
    {{-- </div> --}} {{-- close <div class="row"> --}}      
    @endif

    </div> {{-- close row --}}
</div>  {{-- close container --}}

{!! Session::put('qty', $request->qty) !!}
{!! Session::put('name', $request->name) !!}
{!! Session::put('title', $request->title) !!}
{!! Session::put('email', $request->email) !!}
{!! Session::put('community', $request->community) !!}
{!! Session::put('address1', $request->address1) !!}
{!! Session::put('address2', $request->address2) !!}
{!! Session::put('city', $request->city) !!}
{!! Session::put('state', $request->state) !!}
{!! Session::put('zip', $request->zip) !!}
{!! Session::put('phone', $request->phone) !!}
{!! Session::put('fax', $request->fax) !!}
{!! Session::put('cell', $request->cell) !!}
{!! Session::put('license', $request->license) !!}
{!! Session::put('specialInstructions', $request->specialInstructions) !!}
{!! Session::put('prod_name', $request->prod_name) !!}
{!! Session::put('prod_description', $request->prod_description) !!}
{!! Session::put('imagePath', $request->imagePath) !!}

</body>
</html>
