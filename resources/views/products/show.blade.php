@extends('layouts.main')

@section('title')
  {{ strip_tags($product->prod_name) }}
@endsection

@section('content')
<div class="container"> 
  <div class="row">
    <h2 class="pull-left move-right move-up"> {{ strip_tags($product->prod_name) }} - Data Entry</h2>
  </div>

  <div class="row body-background">

    <div class="col-md-5">

    <br>
    <h5>Hover over the Template or Proof to magnify. <br> Click the Template or Proof to display a PDF in a new tab. <br>
    </h5>

      @if (file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf'))
        <a href="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" target="_blank"><img src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}" class="zoom img-responsive dropshadow" width="100%" alt="..." data-magnify-src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg')}}"></a>

        <h5><small><i>&nbsp;&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Proof&nbsp;&nbsp;</i></small></h5>
      @else
          <div>
            <a href="{{ url(substr_replace($product->imagePath, 'pdf', -3)) }}" target="_blank"><img src="{{ $product->imagePath }}" class="zoom img-responsive dropshadow" width="100%" alt="..." data-magnify-src="{{$product->imagePath}}"></a>
            <h5><small><i>&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Template&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></small></h5>
          </div>
        @endif

      <br>

    </div>

    <div class="col-md-7">
      <br>

  <h4>Your Location: {{ Auth::user()->username }}  {{ Auth::user()->loc_name }}</h4>
  <h5>Enter the data for your {{strip_tags($product->prod_name)}}. <br> 

  Create or Update your proof before adding the product to your cart.</h5>
    
      <div class="panel panel-primary space-above">
      <div class="panel-body">
      
  {!! Form::open(['route' => 'showData', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}

{{--  //////////////////// BC FYI //////////////////// --}}
  @if ($product->id == 101 || $product->id == 102 ||  $product->id == 103 || $product->id == 104 || $product->id == 105 || $product->id == 106 || $product->id == 107 || $product->id == 108 || $product->id == 109) 
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text">
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
      </div>
    </div>

    @if ($product->id == 101 || $product->id == 102 || $product->id == 103 || $product->id == 104 || $product->id == 105 || $product->id == 106)
      <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
          @if ($product->id == 101 || $product->id == 102 || $product->id == 103)
            {!! Form::select("title", $titles, null, ['class' => 'form-control', 'placeholder' => 'Only Approved Titles Are Listed', 'style' => 'color:#8e8e92']) !!}
          @else
            {!! Form::select('title', $titles, null, ['class' => 'form-control', 'placeholder' => 'Only Approved Titles Are Listed (Used for Business Card Only)', 'style' => 'color:#8e8e92']) !!}
          @endif
        </div>
      </div>
    @endif

    <div class="form-group">
      {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address1', 'Address1:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address1', null, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address2', null, ['class' => 'form-control', 'placeholder' => 'Address 2 (Optional)']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
      </div>
    </div>

  <div class="form-inline">

    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
      </div>
      {!! Form::label('zip', 'Zip:&nbsp;&nbsp;&nbsp;', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('zip', null, ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
      </div>
    </div>

  <div class="col-xs-12" style="height:15px;"></div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
           @if (Auth::user()->username == 'HK34')
            {!! Form::text('phone', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
          @else
            {!! Form::text('phone', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif
      </div>
      {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('fax', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
          @else
            {!! Form::text('fax', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif  
      </div>
    </div>
<div class="col-xs-12" style="height:15px;"></div>

  {{-- closes <div class="form-inline"> --}}
    <div class="form-group">
        {!! Form::label('cell', 'Cell:', ['class' => 'col-sm-2 control-label move-down']) !!}
        <div class="col-sm-4 control-text move-down">
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('cell', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.xxx.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Cell numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have exactly 12 digits.',
            ]) !!}
          @else
            {!! Form::text('cell', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
          @endif
        </div>
    </div>

  @endif 
{{-- @endif --}}
<div class="col-xs-12" style="height:15px;"></div>

 



    <div class="form-group">
        {!! Form::label('specialInstructions', 'Special Instructions:', ['class' => 'col-sm-2 control-label move-down']) !!}
        <div class="col-sm-10 move-down move-right">
          {!! Form::textarea('specialInstructions', null, ['class' => 'form-control control-textarea move-right move-down', 'maxlength' => '200', 'rows' => '3', 'placeholder' => 'Enter any Special Instructions here.']) !!}
          <br>
      </div>
    </div>

    {!! Form::hidden('id', $product->id) !!}
    {!! Form::hidden('prod_name', $product->prod_name) !!}
    {!! Form::hidden('prod_description', $product->description) !!}
    {!! Form::hidden('imagePath', $product->imagePath) !!}
    {!! Form::hidden('loc_name', Auth::user()->loc_name) !!}
    {{-- <input type="hidden" name="address2" value= " {{ $request->address2 }} "> --}}
  
  <div class="row text-center">
 <br>
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Proof&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
    </div>
    <div class="col-xs-4">

      @if ($product->id == 101 || $product->id == 104 || $product->id == 107)
        <a href="{{ url('/staff') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      @elseif ($product->id == 102 || $product->id == 105 || $product->id == 108)
        <a href="{{ url('/associate') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      @elseif ($product->id == 103 || $product->id == 106 || $product->id == 109)
        <a href="{{ url('/partner') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      @endif

    </div>  
   
{!! Form::close() !!}

<div class="col-xs-4">

@if (file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf'))
    <form action="/cart" method="POST">
      {!! csrf_field() !!}
      <input type="hidden" name="id" value="{{ $product->id }}">
      {{-- <input type="hidden" name="prod_id" value="{{ $product->id }}"> --}}
      <input type="hidden" name="name" value="{{ $product->prod_name }}">
      <input type="hidden" name="price" value="{{ $product->price }}">
      <input type="hidden" name="community" value= " {{ $request->community }} ">
      {!! Session::put('prod_layout', $product->prod_layout) !!}
      {{-- <input type="hidden" name="email" value="{{ $request->email }}"> --}}
      <input type="hidden" name="quantity" value="{!! $product->quantity !!}">
      <input type="submit" class="btn btn-success btn-block" value="Add to Cart">
    </form>
@endif

  </div>

</div>
        {{-- closes <div class="panel-body"> --}}
        </div> 
        {{-- closes <div class="panel panel-primary space-above"> --}}
      </div> 


</div> {{-- closes <div class="col-md-7"> --}}
</div> {{-- closes <div class="row body-background"> --}}
  </div>

@endsection    

@section('extra-js')
  <script>
    $(document).ready(function() {
      $('.zoom').magnify({
        speed: 100,
        // src: '/images/product-large.jpg'
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('img').magnify({
        magnifiedWidth: 1000px,
        magnifiedHeight: 1000px,
      });
    });

</script>
@endsection




