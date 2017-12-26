@extends('layouts/main')

@section('title')
  Franchise Categories
@endsection

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select a Franchise Stationery Category </h2>
  <a href="{{ url("/") }}" class="btn btn-primary pull-right" role="button">Return to Select a Category Page</a>
  {{-- </div> --}}
</div>
        
<div class="row body-background">   

    <div class="col-sm-4 col-md-4 col-md-offset-1">
    <br>
        <div class="thumbnail">
            <img src="assets/franchise/Photo Sales Rep BC.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Business Cards </h3>
                <p class="description text-muted"> Select from several styles of Business Cards including Franchise, Sales Rep, and Special Order Photo Sales Rep Cards. Franchise Business Cards are printed on heavy cover stock. </p>
                <p>
                    <a href="{!! url("/categories/10") !!}" class="btn btn-primary btn-block" role="button"> Select Business Cards </a>
                </p>
            </div>    
        </div>
    </div>

    <div class="col-sm-4 col-md-4 col-md-offset-1">
    <br>
        <div class="thumbnail">
            <img src="assets/franchise/Crack & Peel Label.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Crack & Peel Labels </h3>
                <p class="description text-muted"> Franchise Crack &amp; Peel Labels have the size and design of a Sales Rep Business Card. Franchise Crack &amp; Peel Labels have an agressive adhesive and are very glossy.</p>
                <p>
                    <a href="{!! url("/categories/13") !!}" class="btn btn-primary btn-block" role="button">Select Crack & Peel Labels</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row body-background">
    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/franchise/Franchise Note Pad.jpg" class="img-responsive" alt="...">

            <div class="caption">
            <h3> Note Pads </h3>
            <p class="description text-muted">Note Pads are the perfect way to communicate written ideas and home specs with your client. Note Pads are personalized and have 50 sheets per pad, padded with a heavy chipboard backer.</p>
            <p>
                <a href="{!! url("/categories/9") !!}" class="btn btn-primary btn-block" role="button">Select Notepads</a>
            </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/franchise/Franchise Envelope.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Envelopes </h3>
                <p class="description text-muted">#10 size, bright 24# white wove premium commercial envelopes that match the letterhead paper.  </p>
                
                <p>
                    <a href="{!! url("/categories/12") !!}" class="btn btn-primary btn-block" role="button">Select Envelopes</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/franchise/Franchise Letterhead.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Letterheads </h3>
                <p class="description text-muted">Franchise Letterheads are printed on premium heavy uncoated text weight paper that matches the #10 Envelope Stock.</p>
                <p>
                    <a href="{!! url("/categories/11") !!}" class="btn btn-primary btn-block" role="button"> Select Letterheads </a>
                </p>
            </div>
        </div>
    </div>

</div> 
@endsection