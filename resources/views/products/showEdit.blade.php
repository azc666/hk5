<!DOCTYPE html>
<html>
<head>
    <title></title>
{!! Html::style('css/mpdfstyle.css') !!}    
</head>
<body>
    
<div class="container">
    <div class="row">

@php
// Session::put('phone', $request->phone);
// Session::put('fax', $request->fax);
// Session::put('cell', $request->cell);
@endphp        

{{-- ////////////////// Business Card //////////////// --}}    
    @if ($request->prod_id == 101 || $request->prod_id == 102 || $request->prod_id == 103)
        <div class="bc_background">
       <div class="bc_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        <div class="bc_title">
            {!! $request->title ?: '&nbsp;' !!}
        </div>
        @if ($request->address2)
            <div class="bc_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="bc_address_line1_1">
                {{ $HKName }}
            </div>
        @endif   
        <div class="bc_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif    
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br> 
    
            @if ($phone != null)
                {{ $phone }} <br>
            @endif 
            
        </div> 
        <div class="bc_email">
            {{ strtolower($HKEmail) }}
        </div>
    </div> {{-- close background class --}}
    @endif

{{-- //////////////////// FYI Pads /////////////////// --}}    
    @if ($request->prod_id == 107 || $request->prod_id == 108 || $request->prod_id == 109)
    <div class="fyi_background">
       <div class="fyi_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        {{-- <div class="fyi_title">
            {!! $request->title ?: '<br>' !!}
        </div> --}}
        @if ($request->address2)
            <div class="fyi_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="fyi_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="fyi_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}  {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif  
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>           
            @if ($phone != null)
                {{ $phone }} <br>
            @endif
        </div>
        <div class="fyi_email">
            {{ strtolower($HKEmail) }}
        </div>
    </div>  {{-- close backgound --}}
        </div> {{-- close <div class="row"> --}}      
    @endif

        {{-- //////////////////// Combo BC FYI Pads /////////////////// --}}    
    @if ($request->prod_id == 104 || $request->prod_id == 105 || $request->prod_id == 106)
    <div class="bcfyi_background">
       <div class="bcfyi_bc_name">
            {{ $request->name ?: '&nbsp;' }}
        </div>
        <div class="bcfyi_bc_title">
            {!! $request->title ?: '&nbsp;' !!}
        </div>
        @if ($request->address2 && $request->email && $phone != null)
            <div class="bcfyi_bc_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="bcfyi_bc_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="bcfyi_bc_address_line2">       
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif  
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>            
            @if ($phone != null)
                {{ $phone }} <br>
            @endif    
        </div>
        <div class="bcfyi_bc_email">
            {{ strtolower($HKEmail) }}
        </div>

       <div class="bcfyi_fyi_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        {{-- <div class="fyi_title">
            {!! $request->title ?: '<br>' !!}
        </div> --}}
        @if ($request->address2 && $request->email && $phone != null)
            <div class="bcfyi_fyi_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="bcfyi_fyi_address_line1_1">
                {{ $HKName }}
            </div>
        @endif  
        <div class="bcfyi_fyi_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif 
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>            
            @if ($phone != null)
                {{ $phone }} <br>
            @endif    
        </div>
        <div class="bcfyi_fyi_email">
            {{ strtolower($HKEmail) }}
        </div>
    {{-- </div> --}}  {{-- close backgound --}}
    {{-- </div> --}} {{-- close <div class="row"> --}}      
    @endif

    </div> {{-- close row --}}
</div>  {{-- close container --}}

{!! Session::put('qty', $request->qty) !!}
{!! Session::put('name', $request->name) !!}
{!! Session::put('title', $request->title) !!}
{!! Session::put('email', strtolower($HKEmail)) !!}
{!! Session::put('address1', $request->address1) !!}
{!! Session::put('address2', $request->address2) !!}
{!! Session::put('city', $request->city) !!}
{!! Session::put('state', $request->state) !!}
{!! Session::put('zip', $request->zip) !!}
{!! Session::put('phone', $request->phone) !!}
{!! Session::put('fax', $request->fax) !!}
{!! Session::put('cell', $request->cell) !!}
{{-- {!! Session::put('cell', $numbcell) !!} --}}
{!! Session::put('specialInstructions', $request->specialInstructions) !!}
{!! Session::put('prod_name', $request->prod_name) !!}
{!! Session::put('prod_description', $request->prod_description) !!}


</body>
</html>
