@extends('layouts/main')

@section('title')
  Corporate Categories
@endsection

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select a Corporate Stationery Category </h2>
  <a href="{{ url("/")}}" class="btn btn-primary pull-right" role="button">Return to Select a Category Page</a>
  {{-- </div> --}}
</div>
        
<div class="row body-background">   

    <div class="col-sm-4 col-md-4 col-md-offset-1">
    <br>
        <div class="thumbnail">
            <img src="assets/corp/Corporate BC.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Business Cards </h3>
                <p class="description text-muted"> Corporate Business Cards have a unique styling, differing from the Franchise Business Card. Corporate Business Cards are printed on heavy, uncoated cover stock. </p>
                <p>
                    <a href="{!! url("/categories/15") !!}" class="btn btn-primary btn-block" role="button"> Select Business Cards </a>
                </p>
            </div>    
        </div>
    </div>

    <div class="col-sm-4 col-md-4 col-md-offset-1">
    <br>
        <div class="thumbnail">
            <img src="assets/corp/Corporate Label.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Crack &amp; Peel Labels </h3>
                <p class="description text-muted"> Corporate Crack &amp; Peel Labels have the size and design of a Corporate Business Card. Corporate Crack &amp; Peel Labels have an agressive adhesive and are very glossy.</p>
                <p>
                    <a href="{!! url("/categories/16") !!}" class="btn btn-primary btn-block" role="button">Select Crack &amp; Peel Labels</a>
                </p>
            </div>
        </div>
    </div>

<div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            {{-- <img style='border:1px solid #000000' src="assets/franchise/Franchise Note Pad - 60 Yr. Logo.jpg" class="img-responsive" alt="..."> --}}
            <img src="assets/corp/Corporate Note Pad.jpg" class="img-responsive" alt="...">

            <div class="caption">
            <h3> Note Pads </h3>
            <p class="description text-muted">Note Pads are the perfect way to communicate written ideas with your clients and co-workers. Note Pads are personalized and have 50 sheets per pad, padded with a heavy chipboard backer.</p>
            <p>
                <a href="{!! url("/categories/14") !!}" class="btn btn-primary btn-block" role="button">Select Notepads</a>
            </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/corp/Corporate Envelope.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Envelopes </h3>
                <p class="description text-muted">#10 size, bright 24# white wove premium commercial envelopes that match the letterhead paper. </p>
                <p>
                    <a href="{!! url("/categories/17") !!}" class="btn btn-primary btn-block" role="button">Select Envelopes</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/corp/Corporate Letterhead.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Letterheads </h3>
                <p class="description text-muted">Corporate Letterheads are printed on premium heavy uncoated text weight paper that matches the #10 Envelope Stock.</p>
                <p>
                    <a href="{!! url("/categories/18") !!}" class="btn btn-primary btn-block" role="button"> Select Letterheads </a>
                </p>
            </div>
        </div>
    </div>

</div> 
@endsection