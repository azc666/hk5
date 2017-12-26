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
                {{ $request->address1 }} <br> {{ $request->city }} , {{ $request->state }}  {{ $request->zip }}
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
                {{ $request->address1 }} <br> {{ $request->city }} , {{ $request->state }}  {{ $request->zip }}
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

{{-- ////////////////////// Fran & DS Note Pads ///////////////////// --}}
    @if ($request->id == 21 || $request->id == 22 || $request->id == 33 || $request->id == 34)
        @if ($request->id == 21 || $request->id == 33)
            <div class="np_background">
        @elseif ($request->id == 22 || $request->id == 34)
            <div class="np60_background">
        @endif
       <div class="np_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>
        <div class="np_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="np_address_line1">
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise
        </div>
        <div class="np_address_line2">
            {{ $address }}
        </div>
        <div class="np_address_line3">
            {{ $phone }} 
        </div>
        <div class="np_address_line4">
            {{ $request->email }} • ArthurRutenbergHomes.com
            @if (!empty($request->license)) 
                • {{ $request->license }}
            @endif   
        </div>
        </div>       
    @endif

{{-- //////////////////// Fran & DS Letterhead //////////////////// --}}    
    @if ($request->id == 8 || $request->id == 17 || $request->id == 37 || $request->id == 38)  
        @if ($request->id == 8 || $request->id == 37) 
            <div class="lh_background">
        @elseif ($request->id == 17 || $request->id == 38)
            <div class="lh60_background">
        @endif
        <div class="lh_address_line1">
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise
        </div>
        <div class="lh_address_line2">
            {{ $address }}
            @if (!empty($request->phone) || (!empty($request->fax))) 
                • {{ $phone }}
            @endif
        </div>
        <div class="lh_address_line3">
            ArthurRutenbergHomes.com
            @if (!empty($request->license)) 
                • {{ $request->license }}
            @endif
        </div>
        </div>       
    @endif

{{-- //////////////////// AR HOME STUDIO Note Pads /////////////////// --}}    
    @if ($request->id == 41)
        <div class="arhsnp_background">
        <div class="arhsnp_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>
        <div class="arhsnp_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="arhsnp_address_line1">
            {{ Auth::user()->loc_name }}
        </div>
        <div class="arhsnp_address_line2">
            {{ $address }}
        </div>
        <div class="arhsnp_address_line3">
            {{ $phone }} 
        </div>
        <div class="arhsnp_address_line4">
            {{ $request->email }} | ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif    

{{-- //////////////////// AR HOMES STUDIO Letterhead //////////////////// --}}    
    @if ($request->id == 43)          
    <div class="arhslh_background">
        <div class="arhslh_address_line1">
            {{ Auth::user()->loc_name }} | An Independently Owned Franchise
        </div>
        <div class="arhslh_address_line2">
            {{ $address }}
            @if (!empty($request->phone) || (!empty($request->fax))) 
                | {{ $phone }}
            @endif
        </div>
        <div class="arhslh_address_line3">
            @if (!empty($request->license)) 
                {{ $request->license }} |
            @endif
            ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif    

{{-- ////////////////// Corp Letterhead ///////////////// --}}    
    @if ($request->id == 5 || $request->id == 14)  
        @if ($request->id == 5) 
            <div class="lh_background">
        @elseif ($request->id == 14)
            <div class="lh60_background">
        @endif
        <div class="lh_address_line1">
            Arthur Rurtenberg Homes, Inc.
        </div>
        <div class="lh_address_line2">
            {{ $address }}
        </div>
        <div class="lh_address_line3">
            {{ $phone }} • ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif

{{-- ///////////////// Franchise & DS Envelope //////////////////// --}}    
    @if ($request->id == 9 || $request->id == 18 || $request->id == 35 || $request->id == 36) 
        @if ($request->id == 9 || $request->id == 35)
            <div class="env_background">
        @elseif ($request->id == 18 || $request->id == 36)
            <div class="env60_background">
        @endif
        
        <div class="env_address">
            {{ Auth::user()->loc_name }}<br>
            An Independently Owned Franchise<br>

        @if ($request->address2)
            {{ $request->address1 }} • {{ $request->address2 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @else
            {{ $request->address1 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @endif

        </div>

    </div>       
    @endif

{{-- ///////////////// AR HOME STUDIO Envelope //////////////////// --}}    
    @if ($request->id == 42)
            <div class="arhsenv_background">
        
        <div class="arhsenv_address">
            {{ Auth::user()->loc_name }}<br>
            An Independently Owned Franchise<br>

        @if ($request->address2)
            {{ $request->address1 }} • {{ $request->address2 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @else
            {{ $request->address1 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @endif

        </div>

    </div>       
    @endif    

{{-- ///////////////////// Corp Envelope ///////////////////// --}}    
    @if ($request->id == 6 || $request->id == 15) 
        @if ($request->id == 6)
            <div class="env_background">
        @elseif ($request->id == 15)
            <div class="env60_background">
        @endif
        
        <div class="env_address">
            Arthur Rutenberg Homes, Inc.<br>

        @if ($request->address2)
            {{ $request->address1 }} • {{ $request->address2 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @else
            {{ $request->address1 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @endif

        </div>

    </div>       
    @endif 

{{-- ////////////////// Our Process Brochures ///////////////// --}}    
    @if ($request->id == 23 || $request->id == 24 || $request->id == 25 || $request->id == 26)  
        @if ($request->id == 23) 
            <div class="opb23_background">
        @elseif ($request->id == 24)
            <div class="opb24_background">
        @elseif ($request->id == 25)
            <div class="opb25_background">
        @elseif ($request->id == 26)
            <div class="opb26_background">
        @endif

            <div class="opb_line1">
               For more information on building your custom home contact: <br>
                @if (!empty($request->name))
                    {{ $request->name }} | 
                @endif

                @if (!empty($request->phone))
                    {{ $request->phone }} | 
                @endif

                @if (!empty($request->cell))
                    Cell {{ $request->cell }} | 
                @endif

                @if (!empty($request->email))
                    {{ $request->email }}
                @endif
            </div>

            <div class="opb_line2">
                @php
                    $string = $request->prod_name;
                    $pieces = explode(' ', $string);
                    $last_word = array_pop($pieces);
                @endphp
                
                {{ Auth::user()->loc_name }} - An Independently Owned Franchise
    
                @if (!empty($request->license))
                     • {{ $request->license }}
                @endif

                • {!! $last_word !!}Collection

            </div>
        </div>       
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
