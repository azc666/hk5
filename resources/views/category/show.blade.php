@extends('layouts/main')

@section('title')
  {{ strip_tags($category->cat_name) }}
@endsection

@php
  $pathToPdf = 'assets/mpdf/temp/showData.pdf';
  $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/showData.jpg';
  Storage::delete([$pathToPdf, $pathToWhereJpgShouldBeStored]);
@endphp

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select {{ $category->cat_name }} </h2>
  
  @if (strpos($category->cat_name, 'Staff') !== false)
    <a href="{{ url("/staff")}}" class="btn btn-primary pull-right" role="button">Return to Staff Stationery Page</a>
  @elseif (strpos($category->cat_name, 'Associate') !== false)
    <a href="{{ url("/associate")}}" class="btn btn-primary pull-right" role="button">Return to Associate Stationery Page</a>
  @elseif (strpos($category->cat_name, 'Partner') !== false)
    <a href="{{ url("/partner")}}" class="btn btn-primary pull-right" role="button">Return to Partner Category Page</a>
  @endif
  
</div>

@foreach($category->products->sortBy('prod_name')->chunk(3) as $productChunk)
        
  <div class="row body-background">   
    {{-- {{ $category->products->count() }} --}}
    @if ($category->products->count())

      @foreach($productChunk as $product)

        <div class="col-sm-6 col-md-12">
          <br><br>
          {{-- <div class="thumbnail"> --}}
         <div class="col-sm-6 col-md-6">     
              <a href="{{ url(substr_replace($product->imagePath, 'pdf', -3)) }}" title="Open PDF of Template in new window" target="_blank"><img src="{{ $product->imagePath }}" class="img-responsive" alt="..."></a>
              <h5 class="pull-right move-up"><small><i>{!! strip_tags($product->prod_name) !!} Template&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></small></h5></a> 
        </div>
        <div class="col-sm-6 col-md-6">
             
              <div class="caption">
                <h3> {!! $product->prod_name !!} </h3><br>
                <p class="description text-muted">{!! nl2br($product->description) !!}</p>
                <br>
                <p><a href="{{ url("/products/$product->id") }}" class="btn btn-primary btn-block" role="button">Enter Your Product Data</a></p>
              </div>
        </div>
          </div>
        {{-- </div> --}}
      
      @endforeach

    @endif 
    
  </div>    
@endforeach
@endsection