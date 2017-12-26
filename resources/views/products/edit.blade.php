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

       @if ($request->prod_id == 23 || $request->prod_id == 24 || $request->prod_id == 25 || $request->prod_id == 26)
        Click <a href="{{ url(substr_replace($product->imagePath, 'pdf', -3)) }}" target="_blank">here </a>to display the 8 page brochure template.
    @endif
    </h5>

      <a href="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" target="_blank"><img src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}" class="zoom img-responsive dropshadow" width="100%" alt="..." data-magnify-src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg')}}"></a>

      <h5><small><i>&nbsp;&nbsp;&nbsp;{!! strip_tags($request->prod_name) !!} Proof&nbsp;&nbsp;</i></small></h5>

      <br>

      {{-- <p class="description text-muted">{!! nl2br($request->prod_description) !!}</p> --}}
      @if (strpos(Session::get('prod_name'),'Process') === false)
        <p class="description text-muted">{!! nl2br($request->prod_description) !!}</p>
      <br><br>
      @endif


    </div>

    <div class="col-md-7">
      <br>

  @if ($request->prod_id == 23 || $request->prod_id == 24 || $request->prod_id == 25 || $request->prod_id == 26)
    <br>
    <p class="description text-muted">{!! nl2br($request->prod_description) !!}</p>
    <br>
  @endif

      <h4>Your Location: {{ Auth::user()->username }}  {{ Auth::user()->loc_name }}</h4>
  <h5>Enter the data for your {{strip_tags($request->name)}}. <br> 

  @if ($request->prod_id == 23 || $request->prod_id == 24 || $request->prod_id == 25 || $request->prod_id == 26)
      Your data is shown on page 7 and page 8 of the brochure.<br>
  @endif

  Create or Update your proof before adding the product to your cart.</h5>
      


      {{-- <h4>Location: {{ Auth::user()->loc_name }}</h4>
      <h5>Be sure to update the proof for your {{ strip_tags($request->prod_name) }}before updating your cart!</h5> --}}
      
      <div class="panel panel-primary space-above">
      <div class="panel-body">
      
  {!! Form::open(['route' => 'showEdit', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}
  @if ($request->prod_id == 1 || $request->prod_id == 2 || $request->prod_id == 3 || $request->prod_id == 4 || $request->prod_id == 10 || $request->prod_id == 11 || $request->prod_id == 12 || $request->prod_id == 13 || $request->prod_id == 7 || $request->prod_id == 16 || $request->prod_id == 21 || $request->prod_id == 22 || $request->prod_id == 27 || $request->prod_id == 28|| $request->prod_id == 29 || $request->prod_id == 30 || $request->prod_id == 31 || $request->prod_id == 32 || $request->prod_id == 33 || $request->prod_id == 34 || $request->prod_id == 19 || $request->prod_id == 20 || $request->prod_id == 39 || $request->prod_id == 40 || $request->prod_id == 41)
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text">
          {!! Form::text('name', Session::get('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::text("title", Session::get('title'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::email('email', Session::get('email'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    @if ($request->prod_id == 2 || $request->prod_id == 3 || $request->prod_id == 11 || $request->prod_id == 12 || $request->prod_id == 7 || $request->prod_id == 16)
      <div class="form-group">
          {!! Form::label('community', 'Community:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
            {!! Form::text('community', Session::get('community'), ['placeholder' => 'No Data', 'class' => 'form-control']) !!}
        </div>
      </div>
    @endif

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

    <div class="form-group">
        {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">
            {!! Form::text('phone', Session::get('phone'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'No Data',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
              'data-parsley-maxlength'        => '14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        => '10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
              ]) !!}
        </div>
        {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
        <div class="col-sm-4 control-text-zip move-down">
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'No Data',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
              'data-parsley-maxlength'        => '14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        => '10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
              ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('license', 'License:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('license', Session::get('license'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
      {!! Form::label('cell', 'Cell:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control', 
              'placeholder'                   => 'No Data',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
              'data-parsley-maxlength'        => '14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        => '10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
              ]) !!}
      </div>
    </div>

    </div> {{-- closes <div class="form-inline"> --}}
  @endif 

{{-- /////////////////// Franchise & Design Studio LH & Env ////////////////// --}}
  @if ($request->prod_id == 8 || $request->prod_id == 9 || $request->prod_id == 17 || $request->prod_id == 18 || $request->prod_id == 35 || $request->prod_id == 36 || $request->prod_id == 37 || $request->prod_id == 38 || $request->prod_id == 42 || $request->prod_id == 43) 
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

  {{-- <div class="form-inline"> --}}

    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
      </div>
    </div>

     <div class="form-group"> 
      {!! Form::label('zip', 'Zip:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('zip', null, ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
      </div>
    </div>

    @if ($request->prod_id == 8 || $request->prod_id == 17 || $request->prod_id == 37 || $request->prod_id == 38 || $request->prod_id == 43)  {{--  Phone fields for LH Only --}}
      <div class="form-group">
          {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">
            {!! Form::text('phone', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
              'data-parsley-maxlength'        => '14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        => '10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
              ]) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">
            {!! Form::text('fax', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
              'data-parsley-maxlength'        => '14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        => '10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
              ]) !!}
        </div>
      </div>   {{-- close form group --}}
   
  {{-- </div> --}}  {{-- close inline --}}

    {{-- <br> --}}
    <div class="form-group">
        {!! Form::label('license', 'License:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
        {!! Form::text('license', null, ['class' => 'form-control', 'placeholder' => 'License # (Optional)']) !!}
      </div>
    </div>
  @endif

  @endif

  {{-- /////////////////////////// Corp LH & Env ///////////////////////// --}}
  @if ($request->prod_id == 5 || $request->prod_id == 14 || $request->prod_id == 6 || $request->prod_id == 15) 
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

    @if ($request->prod_id == 5 || $request->prod_id == 14)  {{--  Phone fields for LH Only --}}
      <div class="form-group">
          {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">
            {!! Form::text('phone', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
              'data-parsley-maxlength'        => '14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        => '10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
              ]) !!}
        </div>
        {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
        <div class="col-sm-4 control-text-zip move-down">
            {!! Form::text('fax', null, [
              'class'                         => 'form-control', 
              'placeholder'                   => '(123) 123-1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
              'data-parsley-maxlength'        => '14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        => '10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
              ]) !!}
        </div>
      </div>   {{-- close form group --}}
   
    </div>  {{-- close inline --}}

    @endif
  @endif

{{-- //////////////////////// Our Process Brochures ///////////////////////// --}}
  @if ($request->prod_id == 23 || $request->prod_id == 24 || $request->prod_id == 25 || $request->prod_id == 26) 
    <div class="form-group">
      {!! Form::label('name', 'Contact Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Contact Name (for page 7)']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('phone', null, [
            'class'                         => 'form-control', 
            'placeholder'                   => '(123) 123-1234  (for page 7)',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
            'data-parsley-maxlength'        => '14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        => '10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
            ]) !!}
        </div>
      </div>

      <div class="form-group">
      {!! Form::label('cell', 'Cell:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('cell', null, [
            'class'                         => 'form-control', 
            'placeholder'                   => '(123) 123-1234  (Optional for page 7)',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\-\(\)\/\s]*$',
            'data-parsley-maxlength'        => '14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        => '10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.'
            ]) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address (for page 7)']) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('license', 'License:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
        {!! Form::text('license', null, ['class' => 'form-control', 'placeholder' => 'License # (Optional for page 8)']) !!}
        </div>
      </div>
 
  @endif

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

{{-- @if (file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf')) --}}
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
@endsection







