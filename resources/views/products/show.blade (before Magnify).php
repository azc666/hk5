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
      <br><br>

      @if (file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf'))
        <a href="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" title="Open PDF of Proof in new window" target="_blank"><img src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}" class="img-responsive dropshadow" width="100%"></a>

        <h5><small><i>&nbsp;&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Proof&nbsp;&nbsp;</i></small></h5>
      @else
        <a href="{{ url(substr_replace($product->imagePath, 'pdf', -3)) }}" title="Open PDF of Template in new window" target="_blank"><img src="{{ $product->imagePath }}" class="img-responsive dropshadow" width="100%" alt="..."></a>
        <h5><small><i>&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Template&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></small></h5>
      @endif

      <br>
      <p class="description text-muted">{!! nl2br($product->description) !!}</p>

      <br><br>
       <div>
        <a class="magnifier-thumb-wrapper" href="http://en.wikipedia.org/wiki/File:Starry_Night_Over_the_Rhone.jpg">
            <img id="thumb" src="http://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Starry_Night_Over_the_Rhone.jpg/200px-Starry_Night_Over_the_Rhone.jpg">
        </a>
        <div class="magnifier-preview" id="preview" style="width: 200px; height: 133px">Starry Night Over The Rhone<br>by Vincent van Gogh
        </div>
    </div>

    </div>

    <div class="col-md-7">
      <br>
      <h4>Location Name: {{ Auth::user()->loc_name }}</h4>
      <h5>Enter the data for your {{strip_tags($product->prod_name)}}. <br> Create or Update a proof, before adding the product to your cart. </h5>
      <div class="panel panel-primary space-above">
      <div class="panel-body">
      
  {!! Form::open(['route' => 'showData', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}

  {{--  =========================== BC LBL NP =============================== --}}
  @if ($product->id == 1 || $product->id == 2 ||  $product->id == 3 || $product->id == 10 || $product->id == 11 ||  $product->id == 12 || $product->id == 7 || $product->id == 16 || $product->id == 21 || $product->id == 22 || $product->id == 4 || $product->id == 13 || $product->id == 27 || $product->id == 28 || $product->id == 29 || $product->id == 30 || $product->id == 31 || $product->id == 32 || $product->id == 19 || $product->id == 20 || $product->id == 33 || $product->id == 34) 
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text">
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::text("title", null, ['placeholder' => 'title', 'class' => 'form-control', 'placeholder' => 'Title']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
      </div>
    </div>

    @if ($product->id == 2 || $product->id == 3 || $product->id == 11 ||  $product->id == 12 || $product->id == 7 || $product->id == 16) {{-- ====== Display Community Field on Sales Rep Items=========== --}}
      <div class="form-group">
          {!! Form::label('community', 'Community:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
            {!! Form::text('community', null, ['placeholder' => 'Community Name (Optional)', 'class' => 'form-control']) !!}
        </div>
      </div>
    @endif

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
      <div class="col-sm-5 control-text move-down">
          {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
      </div>
      {!! Form::label('zip', 'Zip:&nbsp;&nbsp;&nbsp;', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('zip', null, ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
      </div>
    </div>
<div class="col-xs-12" style="height:15px;"></div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
          {!! Form::text('phone', null, [
            'class'                         => 'form-control', 
            'placeholder'                   => '(123) 123-1234',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
      </div>
      {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('fax', null, [
            'class'                         => 'form-control', 
            'placeholder'                   => '(123) 123-1234',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
      </div>
    </div>
<div class="col-xs-12" style="height:15px;"></div>

 @if ($product->id == 1 || $product->id == 2 ||  $product->id == 3 || $product->id == 7 || $product->id == 10 || $product->id == 11 ||  $product->id == 12 || $product->id == 16 || $product->id == 21 || $product->id == 22 || $product->id == 29 || $product->id == 30 || $product->id == 31 || $product->id == 32 || $product->id == 33 || $product->id == 34)
    <div class="form-group">
        {!! Form::label('license', 'License:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
        {!! Form::text('license', null, ['class' => 'form-control', 'placeholder' => 'License # (Optional)']) !!}
      </div>
      
        {!! Form::label('cell', 'Cell:', ['class' => 'pull-left move-right move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('cell', null, [
            'class'                         => 'form-control', 
            'placeholder'                   => '(123) 123-1234',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
      </div>
    </div>
  </div> {{-- closes <div class="form-inline"> --}}
  <div class="col-xs-12" style="height:15px;"></div>

  @else
    <div class="form-group">
        {!! Form::label('cell', 'Cell:', ['class' => 'col-sm-2 control-label move-down']) !!}
        <div class="col-sm-4 control-text move-down">
          {!! Form::text('cell', null, [
            'class'                         => 'form-control', 
            'placeholder'                   => '(123) 123-1234',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
        </div>
    </div>
  @endif 
@endif
<div class="col-xs-12" style="height:15px;"></div>

  {{-- ========================= Franchise & Design Studio LH & Env ========================= --}}
  @if ($product->id == 6 || $product->id == 8 || $product->id == 9 || $product->id == 15 || $product->id == 17 || $product->id == 18 || $product->id == 35 || $product->id == 36 || $product->id == 37 || $product->id == 38) 
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
    <br><br>

    @if ($product->id == 8 || $product->id == 17 || $product->id == 37 || $product->id == 38)  {{--  Phone fields for LH Only --}}
      <div class="form-group">
          {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">
            {!! Form::text('phone', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
        </div>
        {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
        <div class="col-sm-4 control-text-zip move-down">
            {!! Form::text('fax', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
        </div>
      </div>   {{-- close form group --}}
   
  </div>  {{-- close inline --}}

    <br>
    <div class="form-group">
        {!! Form::label('license', 'License:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
        {!! Form::text('license', null, ['class' => 'form-control', 'placeholder' => 'License # (Optional)']) !!}
      </div>
    </div>
  @endif

  @endif

  {{-- ======================= Corp LH & Env ============================ --}}
  @if ($product->id == 5 || $product->id == 14) 
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
    <br><br>

    @if ($product->id == 5 || $product->id == 14)  {{--  Phone fields for LH Only --}}
      <div class="form-group">
          {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">
            {!! Form::text('phone', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
        </div>
        {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
        <div class="col-sm-4 control-text-zip move-down">
            {!! Form::text('fax', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
        </div>
      </div>   {{-- close form group --}}
   
  </div>  {{-- close inline --}}

    {{-- <br> --}}
    {{-- <div class="form-group">
        {!! Form::label('license', 'License:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
        {!! Form::text('license', null, ['class' => 'form-control', 'placeholder' => 'License # (Optional)']) !!}
      </div>
    </div> --}}
  @endif

  @endif

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
    {!! Form::hidden('loc_name', Auth::user()->loc_name) !!}
    {{-- <input type="hidden" name="address2" value= " {{ $request->address2 }} "> --}}
  
  <div class="row text-center">
 <br>
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Proof&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
    </div>
    <div class="col-xs-4">
      <a href="{{ url('/categories/' . session('catId')) }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
        </div> {{-- closes <div class="panel-body"> --}}
      </div> {{-- closes <div class="panel panel-primary space-above"> --}}

    </div> {{-- closes <div class="col-md-7"> --}}

  </div> {{-- closes <div class="row body-background"> --}}
  {{-- </div> --}}

@endsection    







