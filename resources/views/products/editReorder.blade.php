@extends('layouts.main')
{{-- {{ Session::put('prod_name', $request->prod_name) }} --}}
@section('title')
  Edit {{ strip_tags(Session::get('prod_name')) }}
@endsection

@section('content')
<div class="container"> 
  <div class="row">
    <h2 class="pull-left move-right move-up"> {{ strip_tags(Session::get('prod_name')) }} - Data Edit</h2>
  </div>

  <div class="row body-background">

    <div class="col-md-5">

      <br>
      <h5>Hover over the Template or Proof to magnify. <br> Click the Template or Proof to display a PDF in a new tab. <br>
      </h5>

      <a href="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" target="_blank"><img src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}" class="zoom img-responsive dropshadow" width="100%" alt="..." data-magnify-src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg')}}"></a>

      <h5><i>&nbsp;&nbsp;&nbsp;{!! strip_tags($request->prod_name) !!} Proof&nbsp;&nbsp;</i></h5>
      
      <br>

      <button class="btn btn-primary move-right hidden-print" onclick="printImg('{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Print the Proof&nbsp;&nbsp;&nbsp;</button>
      <br><br>
      <p class="description text-muted move-right">{!! nl2br(Session::get('prod_description')) !!}</p>

    </div>

    <div class="col-md-7">
      <br>

  <h4>Your Location: {{ Auth::user()->username }}  {{ Auth::user()->loc_name }}</h4>
  <h5>Enter the data for your {{strip_tags($request->name)}}. <br> 

 Create or Update your proof before adding the product to your cart.</h5>
      
      <div class="panel panel-primary space-above">
      <div class="panel-body">
      
  {!! Form::open(['route' => 'showEdit', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}

{{--  ////////////////////// BC FYI ///////////////////// --}}
  @if ($request->prod_id == 101 || $request->prod_id == 102 ||  $request->prod_id == 103 || $request->prod_id == 104 || $request->prod_id == 105 || $request->prod_id == 106 || $request->prod_id == 107 || $request->prod_id == 108 || $request->prod_id == 109) 
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text">
          {!! Form::text('name', Session::get('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
      </div>
    </div>

    {{-- /////// Staff Titles /////// --}}
    @if ($request->prod_id == 101 || $request->prod_id == 104) 
      <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
          @if ($request->prod_id == 101)
            {!! Form::select("title", $titles, null, [
              'class'                         => 'form-control', 
              'placeholder'                   => 'Only Approved Titles Are Listed',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
              'data-parsley-required'         => 'true',
              'data-parsley-required-message' => 'this field is required',
            ]) !!}
          @else
            {!! Form::select('title', $titles, null, [
              'class'                         => 'form-control', 
              'placeholder'                   => 'Only Approved Titles Are Listed (Used for Business Card Only)',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
              'data-parsley-required'         => 'true',
              'data-parsley-required-message' => 'this field is required',
            ]) !!}
          @endif
        </div>
      </div>
    @endif

    {{-- /////// Assoc & Partner Titles /////// --}}
    @if ($request->prod_id == 102 || $request->prod_id == 103 || $request->prod_id == 105 || $request->prod_id == 106) 
      <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
          @if ($request->prod_id == 102 || $request->prod_id == 103)
            {!! Form::select("title", $titles, null, [
              'class'                         => 'form-control', 
              'placeholder'                   => 'Only Approved Titles Are Listed',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
            ]) !!}
          @else
            {!! Form::select('title', $titles, null, [
              'class'                         => 'form-control', 
              'placeholder'                   => 'Only Approved Titles Are Listed (Used for Business Card Only)',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
            ]) !!}
          @endif
        </div>
      </div>
    @endif

    <div class="form-group">
      {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::email('email', Session::get('email'), [
          'class'                         => 'form-control', 
          'placeholder'                   => 'No Data',
          'data-parsley-required'         => 'true',
          'data-parsley-required-message' => 'this field is required'
        ]) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address1', 'Address1:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address1', Session::get('address1'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address2', Session::get('address2'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('city', Session::get('city'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="form-inline">

    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('state', Session::get('state'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
      {!! Form::label('zip', 'Zip:&nbsp;&nbsp;&nbsp;', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('zip', Session::get('zip'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="col-xs-12" style="height:15px;"></div>
    <div class="form-group">
      {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('phone', Session::get('phone'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}

          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('phone', Session::get('phone'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('phone', Session::get('phone'), [
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
          
          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
          
          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('fax', Session::get('fax'), [
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
   
</div>
 <div class="col-xs-12" style="height:15px;"></div>
    <div class="form-group">
      {!! Form::label('cell', 'Cell:', ['class' => 'col-sm-2 control-label move-down']) !!}
        <div class="col-sm-4 control-text move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.xxx.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Cell numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have exactly 12 digits.',
            ]) !!}
          
          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Cell numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have exactly 12 digits.',
            ]) !!}

          {{-- UK --}}
          @elseif (Auth::user()->username == 'HK46')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'xx.xxxx.xxxxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'17',
              'data-parsley-maxlength-message'=>'Cell numbers should have no more than 14 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have no less than 12 digits.',
            ]) !!}
            
          @else
          @php
            // exit;
          @endphp
            {!! Form::text('cell', $request->cell, [
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
    {{-- </div> --}} {{-- closes <div class="form-inline"> --}}
   
  <div class="col-xs-12" style="height:15px;"></div>



    <div class="form-group">
    {!! Form::label('specialInstructions', 'Special Instructions:', ['class' => 'col-sm-2 control-label move-down']) !!}
    <div class="col-sm-10 move-down move-right">
    {!! Form::textarea('specialInstructions', Session::get('specialInstructions'), ['class' => 'form-control control-textarea move-right move-up', 'maxlength' => '200', 'rows' => '3', 'placeholder' => 'Enter any Special Instructions here.']) !!}
    <br><br>
    </div>
    </div>

    {!! Form::hidden('prod_id', $request->prod_id) !!}
    {!! Form::hidden('rowId', $request->rowId) !!}
    {!! Form::hidden('loc_name', Auth::user()->loc_name) !!}
    {!! Form::hidden('proofPath', Session::get('proofPath')) !!}
    <input type="hidden" name="prod_name" value="{{ Session::get('prod_name') }}">
    <input type="hidden" name="prod_description" value="{{ $request->prod_description }}">
    
  <div class="row text-center">

    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Proof&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
    </div>
    <div class="col-xs-4">
      <a href="{{ url('/cart') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>  
   {{-- <br><br> --}}
{!! Form::close() !!}

<div class="col-xs-4">

    {!! Form::open(['route' => 'editcart', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}
      <input name="_method" type="hidden" value="PATCH">  
    {{-- <form action="editcart"> --}}
      {!! csrf_field() !!}
      
      <input type="hidden" name="rowId" value="{{ $request->rowId }}">
      {{-- <input type="hidden" name="prod_name" value="{{ $product->prod_name }}"> --}}
      {{-- <input type="hidden" name="price" value="{{ $product->price }}"> --}}
      {{-- <input type="hidden" name="proofed" value=1> --}}
      {{-- {!! Session::put('prod_layout', $product->prod_layout) !!} --}}
      {{-- <input type="hidden" name="email" value="{{ $request->email }}"> --}}
      {{-- <input type="hidden" name="qty" value="{!! $request->quantity !!}"> --}}
      <input type="hidden" name="prod_id" value="{!! $request->prod_id !!}">
      <input type="submit" class="btn btn-success btn-block" value="Update Cart">
    {{-- </form> --}}
    {!! Form::close() !!}
{{-- @endif --}}
<br>
  </div>

</div>
        </div> {{-- closes <div class="panel-body"> --}}
      </div> {{-- closes <div class="panel panel-primary space-above"> --}}

    </div> {{-- closes <div class="col-md-7"> --}}

  </div> {{-- closes <div class="row body-background"> --}}
  {{-- </div> --}}

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
<script>
function printImg(url) {
  var win = window.open('');
  win.document.write('<img style="width:600px;" src="' + url + '" onload="window.print();window.close()" />');
  win.focus();
}
</script>
@endsection







