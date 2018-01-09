@extends('layouts/main')

@section('title')
  Staff Stationery Items
@endsection

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select a Staff Stationery Item </h2>
  <a href="{{ url("/") }}" class="btn btn-primary pull-right" role="button">Return to Select a Category Page</a>
  {{-- </div> --}}
</div>
        
<div class="row body-background">   

    <div class="col-sm-3 col-md-4">
        <br>
        <div class="thumbnail">
            <img src="assets/staff/sbc_display.jpg" class="img-responsive" alt="Select a Business Card">
            <div class="caption">
                {{-- <br><br><br><br> --}}
                <h3> Business Cards </h3><br>
                {{-- <p class="description text-muted"> Select a Business Card.<br><br></p> --}}
                <p>
                    <a href="{!! url("/categories/4") !!}" class="btn btn-primary btn-block" role="button"> Select Business Cards </a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-4">
        <br>
        <div class="thumbnail">
            <img src="assets/staff/sfyi_display.jpg" class="img-responsive" alt="Select an FYI Pad">
            <div class="caption">
                <h3> FYI Pads </h3><br>
                {{-- <p class="description text-muted"> Select an FYI Pad. <br><br></p> --}}
                <p>
                    <a href="{!! url("/categories/5") !!}" class="btn btn-primary btn-block" role="button"> Select FYI Pads </a>
                </p>
            </div>    
        </div>
    </div>

    <div class="col-sm-4 col-md-4">
        <br>
        <div class="thumbnail">
            <img src="assets/staff/sbcfyi_display.jpg" class="img-responsive" alt="Select a Combo">
            <div class="caption">
                <h3> Combo FYI Pads & BCs </h3><br>
                {{-- <p class="description text-muted"> Select a Combo.<br><br></p> --}}
                <p>
                    <a href="{!! url("/categories/6") !!}" class="btn btn-primary btn-block" role="button"> Select Combo FYI Pads & BCs </a>
                </p>
            </div>
        </div>
    </div>

</div> 
@endsection