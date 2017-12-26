<!DOCTYPE html>
<html>
<head>
    <title></title>
{!! Html::style('css/mpdfstyle.css') !!}    
</head>
<body>
    
<div class="container">
    <div class="row">

{{-- ///////////////// Set $address /////////////// --}}
    @php // $address
        if ($request->prod_id != 9 || $request->prod_id != 18) {
            if ($request->address2) {
                $address = $request->address1 . ' • ' . $request->address2 . ' • ' . $request->city . ', ' . $request->state . '&nbsp;' . $request->zip;
            }
            else  {
                $address = $request->address1 . ' • ' . $request->city . ', ' . $request->state . '&nbsp;' . $request->zip;
            }
        }
        if ($request->prod_id == 39 || $request->prod_id == 40 || $request->prod_id == 41 || $request->prod_id == 43) {
            if ($request->address2) {
                $address = $request->address1 . ', ' . $request->address2 . ', ' . $request->city . ', ' . $request->state . '&nbsp;' . $request->zip;
            } else {
                $address = $request->address1 . ', ' . $request->city . ', ' . $request->state . '&nbsp;' . $request->zip;
            }
        }    
    @endphp  

{{-- /////////////////// Franchise BC ///////////////// --}}
    @if ($request->prod_id == 1 || $request->prod_id == 10)
        @if ($request->prod_id == 1)
             <div class="fbc_background">
        @elseif ($request->prod_id == 10)
             <div class="fbc60_background">
        @endif
       
            <div class="fran_name">
                {{ $request->name }}
            </div>
            <div class="fran_title">
                {!! $request->title ?: '<br>' !!}
            </div>
            <div class="fran_address">
                {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>

                {{ $address }} <br>
                {{ $phone }} <br>

                {{ $request->email }} • ArthurRutenbergHomes.com <br>
                {{ $request->license }}
            </div>
        </div> {{-- close background class --}}
    @endif

{{-- ////////////// Sales Rep BC & Franchise LBL //////////// --}}
    @if ($request->prod_id == 2 || $request->prod_id == 11 || $request->prod_id == 7 || $request->prod_id == 16)
        @if ($request->prod_id == 2 || $request->prod_id == 7)
             <div class="srbc_background">
        @elseif ($request->prod_id == 11 || $request->prod_id == 16)
             <div class="srbc60_background">
        @endif
       
            <div class="srbc_name">
                {{ $request->name }}
            </div>
            <div class="srbc_title">
                {!! $request->title ?: '<br>' !!}
            </div>
            <div class="srbc_address">
                {{ $request->community }}<br>
                {{ $address }} <br>
                {{ $phone }} <br>
                {{ $request->email }} • ArthurRutenbergHomes.com <br>
                {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>
                {{ $request->license }}
            </div>
        </div> {{-- close background class --}}
    @endif

{{-- ///////////////// Photo Salse Rep BC /////////////// --}}
    @if ($request->prod_id == 3 || $request->prod_id == 12)
        @if ($request->prod_id == 3)
             <div class="psrbc_background">
        @elseif ($request->prod_id == 12)
            <div class="psrbc60_background">
        @endif
       
        <div class="psrbc_name">
            {{ $request->name }}
        </div>
        <div class="psrbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="psrbc_address">
            @if ($request->community)
                {{ $request->community }}<br>
            @else
                <br><br>
            @endif
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com <br>
            {{ $request->license }}
        </div>
            </div> {{-- close background class --}}
    @endif

{{-- ///////////////// Design Studio BC & LBL /////////////// --}}
    @if ($request->prod_id == 29 || $request->prod_id == 30 || $request->prod_id == 31 || $request->prod_id == 32)
        @if ($request->prod_id == 29 || $request->prod_id == 31)
             <div class="dsbc_background">
        @elseif ($request->prod_id == 30 || $request->prod_id == 32)
             <div class="dsbc60_background">
        @endif
       
            <div class="dsbc_name">
            {{ $request->name }}
        </div>
        <div class="dsbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="dsbc_address">
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com <br>
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>
            {{ $request->license }}
        </div>
            </div> {{-- close background class --}}
    @endif

    {{-- ///////////////// ARHome Studio BC & LBL ///////////////// --}}    
    @if ($request->prod_id == 39 || $request->prod_id == 40)
        <div class="arhsbc_background">
       
        <div class="arhsbc_name">
            {{ $request->name }}
        </div>
        <div class="arhsbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="arhsbc_address">
            {{ Auth::user()->loc_name }} <br>
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }}  | ArthurRutenbergHomes.com
        </div>
            </div> {{-- close background class --}}
    @endif

{{-- ///////////////// Corp BC & LBL ///////////////// --}}     
    @if ($request->prod_id == 4 || $request->prod_id == 13 || $request->prod_id == 27 || $request->prod_id == 28)
        @if ($request->prod_id == 4 || $request->prod_id == 28)
             <div class="cbc_background">
        @elseif ($request->prod_id == 13 || $request->prod_id == 27)
            <div class="cbc60_background">
        @endif
       
        <div class="cbc_name">
            {{ $request->name }}
        </div>
        <div class="cbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="cbc_address">
            Arthur Rutenberg Homes, Inc. <br>
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com
        </div>
            </div> {{-- close background class --}}
    @endif

{{-- //////////////////// Corp NP //////////////////// --}}     
    @if ($request->prod_id == 19 || $request->prod_id == 20)
        @if ($request->prod_id == 19)
            <div class="np_background">
        @elseif ($request->prod_id == 20)
            <div class="np60_background">
        @endif
       <div class="np_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>
        <div class="np_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="cnp_address_line1">
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise
        </div>
        <div class="cnp_address_line2">
            {{ $address }}
        </div>
        <div class="cnp_address_line3">
            {{ $phone }} 
        </div>
        <div class="cnp_address_line4">
            @if (!empty($request->license)) 
                {{ $request->license }} •
            @endif
            {{ $request->email }} • ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif

{{-- ///////////// Franchise & Design Studio NP ////////// --}}
    @if ($request->prod_id == 21 || $request->prod_id == 22 || $request->prod_id == 33 || $request->prod_id == 34)
        @if ($request->prod_id == 21 || $request->prod_id == 33)
            <div class="np_background">
        @elseif ($request->prod_id == 22 || $request->prod_id == 34)
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

{{-- ///////////////// AR HOME STUDIO Note Pads /////////////// --}}    
    @if ($request->prod_id == 41)
        <div class="arhsnp_background">
        <div class="arhsnp_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>
        <div class="arhsnp_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="arhsnp_address_line1">
            Arthur Rutenberg Homes, Inc.
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

{{-- ////////////////// Fran & DS Letterhead ///////////////// --}}
    @if ($request->prod_id == 8 || $request->prod_id == 17 || $request->prod_id == 37 || $request->prod_id == 38)  
        @if ($request->prod_id == 8 || $request->prod_id == 37) 
            <div class="lh_background">
        @elseif ($request->prod_id == 17 || $request->prod_id == 38)
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

{{-- ////////////// AR HOMES STUDIO Letterhead ///////////// --}}    
    @if ($request->prod_id == 43)          
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

{{-- ///////////////// Franchise & DS Envelope ////////////////// --}}    
    @if ($request->prod_id == 9 || $request->prod_id == 18 || $request->prod_id == 35 || $request->prod_id == 36)
        @if ($request->prod_id == 9 || $request->prod_id == 35)
            <div class="env_background">
        @elseif ($request->prod_id == 18 || $request->prod_id == 36)
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

{{-- ///////////////// AR HOMES STUDIO Envelope ////////////////// --}}    
    @if ($request->prod_id == 42)
        <div class="arhsenv_background">        
            <div class="arhsenv_address">
                {{ Auth::user()->loc_name }}<br>
                An Independently Owned Franchise<br>

            @if ($request->address2)
                {{ $request->address1 }} | {{ $request->address2 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
            @else
                {{ $request->address1 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
            @endif

            </div>
        </div>       
    @endif    

{{-- ////////////////////////// Corp Letterhead ////////////////////////////// --}}    
    @if ($request->prod_id == 5 || $request->prod_id == 14)  
        @if ($request->prod_id == 5) 
            <div class="lh_background">
        @elseif ($request->prod_id == 14)
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

{{-- ///////////////////////////// Corporate Envelope ///////////////////////////// --}}    
    @if ($request->prod_id == 6 || $request->prod_id == 15) 
        @if ($request->prod_id == 6)
            <div class="env_background">
        @elseif ($request->prod_id == 15)
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

{{-- //////////////////////// Our Process Brochures //////////////////////// --}}    
    @if ($request->prod_id == 23 || $request->prod_id == 24 || $request->prod_id == 25 || $request->prod_id == 26)  
        @if ($request->prod_id == 23) 
            <div class="opb23_background">
        @elseif ($request->prod_id == 24)
            <div class="opb24_background">
        @elseif ($request->prod_id == 25)
            <div class="opb25_background">
        @elseif ($request->prod_id == 26)
            <div class="opb26_background">
        @endif

            <div class="opb_line1">
                For more information on building your custom home contact: <br>
                @if (!empty($request->name))
                    Sales Consultant {{ $request->name }} | 
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

                • {!! $last_word !!} Collection

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


</body>
</html>
