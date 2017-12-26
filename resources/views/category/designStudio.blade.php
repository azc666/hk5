@extends('layouts/main')

@section('title')
  Design Studio Categories
@endsection

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select a Design Studio Stationery Category </h2>
  <a href="{{ url("/") }}" class="btn btn-primary pull-right" role="button">Return to Select a Category Page</a>
  {{-- </div> --}}
</div>
        
<div class="row body-background">   

    <div class="col-sm-4 col-md-4 col-md-offset-1">
    <br>
        <div class="thumbnail">
            <img src="assets/ds/ARHome Studio BC.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Business Cards </h3>
                <p class="description text-muted"> Select a Design Studio Business Card. Design Studio Business Cards are available with the classic design or the new "AR HOME STUDIO" Logo. <br><br></p>
                <p>
                    <a href="{!! url("/categories/21") !!}" class="btn btn-primary btn-block" role="button"> Select Business Cards </a>
                </p>
            </div>    
        </div>
    </div>

    <div class="col-sm-4 col-md-4 col-md-offset-1">
    <br>
        <div class="thumbnail">
            <img src="assets/ds/ARHome Studio LBL.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Crack & Peel Labels </h3>
                <p class="description text-muted"> Crack & Peel Labels have the design of a Design Studio Business Card with or without the new "AR HOME STUDIO" Logo. Crack & Peel Labels have an agressive adhesive and are very glossy.</p>
                <p>
                    <a href="{!! url("/categories/22") !!}" class="btn btn-primary btn-block" role="button">Select Crack & Peel Labels</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            {{-- <img style='border:1px solid #000000' src="assets/franchise/Franchise Note Pad - 60 Yr. Logo.jpg" class="img-responsive" alt="..."> --}}
            <img src="assets/ds/ARHome Studio Note Pad.jpg" class="img-responsive" alt="...">

            <div class="caption">
            <h3> Note Pads </h3>
            <p class="description text-muted">Note Pads are the perfect way to communicate written ideas and home specs with your client. Note Pads are personalized and have 50 sheets padded with a heavy chipboard backer. Design Studio Note Pads are available with and without the new AR HOME STUDIO Logo.</p>
            <p>
                <a href="{!! url("/categories/20") !!}" class="btn btn-primary btn-block" role="button">Select Notepads</a>
            </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/ds/ARHome Studio Envelope.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Envelopes </h3>
                <p class="description text-muted">#10 size premium commercial envelopes that match the letterhead paper. Envelopes are available with and without the new "AR HOME STUDIO" Logo.. </p>
                <p>
                    <a href="{!! url("/categories/23") !!}" class="btn btn-primary btn-block" role="button">Select Envelopes</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/ds/ARHome Studio Letterhead.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Letterheads </h3>
                <p class="description text-muted">Design Studio letterheads are printed on a premium uncoated heavyweight stock that matches the #10 Envelope. Design Studio letterheads are available with and without the new AR HOME STUDIO Logo.</p>
                <p>
                    <a href="{!! url("/categories/24") !!}" class="btn btn-primary btn-block" role="button"> Select Letterheads </a>
                </p>
            </div>
        </div>
    </div>

</div> 
@endsection