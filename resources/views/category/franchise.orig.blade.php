<br>
@extends('layouts/main')

@section('title')
  Franchise Stationery
@endsection

@section('content')
    <div class="container body-background">    
        <div class="row">
            <div class="col-md-8">
             <h2 class="page_head"><img src="assets/header2.png" class="img-responsive" alt=""></h2><br>
             @include('partials/_carousel')
    <br>
    
    <p>
        <h2 class="menu_link"><span id="menu_text">Franchise Stationery Items</span>
        {{-- <span class="pull-right">hi</span></h2> --}}
    </p>

    <p>
        <a class="menu_link" id="menu_bullet" href="{{ Auth::check() ? url('/categories/10') : '#'}}">
        <h3><span id="menu_text">Franchise Business Cards</span></h3>
        </a>
    </p>
    
    <p>
        <a class="menu_link" id="menu_bullet" href="{{ Auth::check() ? url('/categories/11') : '#'}}">
            <h3><span id="menu_text">Franchise Letterheads</span></h3>
        </a>
    </p>
    
    <p>
        <a class="menu_link" id="menu_bullet" href="{{ Auth::check() ? url('/categories/12') : '#'}}">
            <h3><span id="menu_text">Franchise Envelopes</span></h3>
        </a>
    </p>

    <p>
        <a class="menu_link" id="menu_bullet" href="{{ Auth::check() ? url('/categories/13') : '#'}}">
            <h3><span id="menu_text">Franchise Crack and Peel Labels</span></h3>
        </a>
    </p>
    
    <p>
        <a class="menu_link" id="menu_bullet" href="{{ Auth::check() ? url('/categories/9') : '#'}}">
            <h3><span id="menu_text">Franchise Note Pads <img src="assets/new_burst.jpg"  alt="New Product - Personal Note Pads!" width="75" align="middle"></span></h3>
        </a>
    </p>
         </div>


         <br>
        <div class="col-md-4 aside">
            @if (!Auth::check())
                <h3>Log In</h3>
                @include('partials/_login') 
            @else
                <div class="widget text-muted">
                    <h4> {{ Auth::user()->loc_name }} </h4>
                    <div class="inner">
                        BC# {{ Auth::user()->loc_num }}<br>
                        {{ Auth::user()->loc_address1 }} <br>
                        {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                    </div>
                </div> 
                <div class="widget text-muted">
                    <h4> Administrative Contact Info </h4>
                    <div class="inner">
                        Contact: {{ Auth::user()->contact_a }}<br>
                        Email: {{ Auth::user()->email_a }} <br>
                        Phone: {{ Auth::user()->phone_a }}<br>
                        Fax: {{ Auth::user()->fax_a }}<br>
                        Cell: {{ Auth::user()->cell_a }}<br>
                    </div>
                </div>
                <div class="widget text-muted">
                    <h4> Billing Contact Info </h4>
                    <div class="inner">
                        Contact: {{ Auth::user()->contact_b }}<br>
                        Email: {{ Auth::user()->email_b }} <br>
                        Phone: {{ Auth::user()->phone_b }}<br>
                        Fax: {{ Auth::user()->fax_b }}<br>
                        Cell: {{ Auth::user()->cell_b }}<br>
                    </div>
                </div>
                <div class="widget text-muted">
                    <h4> Shipping Contact Info </h4>
                    <div class="inner">
                        Contact: {{ Auth::user()->contact_s }}<br>
                        Email: {{ Auth::user()->email_s }} <br>
                        Phone: {{ Auth::user()->phone_s }}<br>
                        Fax: {{ Auth::user()->fax_s }}<br>
                        Cell: {{ Auth::user()->cell_s }}<br>
                    </div>
                  </div>  
                <div class="widget text-muted">
                    <h4> Shipping Location </h4>
                    <div class="inner">
                        {{ Auth::user()->loc_name }} <br>    
                        {{ Auth::user()->address1_s }} <br>
                        {{ Auth::user()->city_s }}, {{ Auth::user()->state_s }} {{ Auth::user()->zip_s }}<br>
                    </div>
                </div>         
            @endif
        </div>
    </div>

@endsection

</div>

</html>