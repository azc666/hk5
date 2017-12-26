@extends('layouts/main')

@section('title')
  Corporate Categories
@endsection

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select "Our Process Brochure" Version </h2>
  <a href="{{ url("/")}}" class="btn btn-primary pull-right" role="button">Return to Select a Category Page</a>
  {{-- </div> --}}
</div>
        
<div class="row body-background">   

    <div class="col-md-offset-1 col-sm-5 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/opb/Classics Plan Collection.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Classics Plan Collection </h3>
                <p class="description text-muted"> Corporate Business Cards have a unique styling, differing from the Franchise Business Card. Corporate Business Cards are available with or without the ARH 60 Year Logo. </p>
                <p>
                    <a href="{!! url("/products/23") !!}" class="btn btn-primary btn-block" role="button"> Select Classic Plan Collection </a>
                </p>
            </div>    
        </div>
    </div>

<div class="col-sm-5 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/opb/Coastal Plan Collection.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Coastal Plan Collection </h3>
                <p class="description text-muted"> Corporate Business Cards have a unique styling, differing from the Franchise Business Card. Corporate Business Cards are available with or without the ARH 60 Year Logo. </p>
                <p>
                    <a href="{!! url("/products/24") !!}" class="btn btn-primary btn-block" role="button"> Select Coastal Plan Collection </a>
                </p>
            </div>    
        </div>
    </div>

    <div class="col-md-offset-1 col-sm-5 col-md-5 col-md-offset-1">
    <br>
        <div class="thumbnail">
            <img src="assets/opb/Mountain Plan Collection.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Mountain Plan Collection </h3>
                <p class="description text-muted"> Corporate Business Cards have a unique styling, differing from the Franchise Business Card. Corporate Business Cards are available with or without the ARH 60 Year Logo. </p>
                <p>
                    <a href="{!! url("/products/25") !!}" class="btn btn-primary btn-block" role="button"> Select Mountain Plan Collection </a>
                </p>
            </div>    
        </div>
    </div>

    <div class="col-sm-5 col-md-5">
    <br>
        <div class="thumbnail">
            <img src="assets/opb/Sunbelt Plan Collection.jpg" class="img-responsive" alt="...">
            <div class="caption">
                <h3> Sunbelt Plan Collection </h3>
                <p class="description text-muted"> Corporate Business Cards have a unique styling, differing from the Franchise Business Card. Corporate Business Cards are available with or without the ARH 60 Year Logo. </p>
                <p>
                    <a href="{!! url("/products/26") !!}" class="btn btn-primary btn-block" role="button"> Select Sunbelt Plan Collection </a>
                </p>
            </div>    
        </div>
    </div>

</div> 
@endsection