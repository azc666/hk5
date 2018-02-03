<!DOCTYPE html>

@extends('layouts/main')

@section('title')
   Titles Maintenance
@endsection

@section('content')
   
    {{-- <div class="container">
        <div class="row">
            @include('partials/_navbar')
        </div>
    </div> --}}

<div class="container">
  <div class="row">
    <h2 class="pull-left move-up"> Titles Maintenance </h2>
    {{-- <div class="form-group row add"> --}}
    {{-- <div class="col-md-8"> --}}
        {{-- <input type="text" class="form-control" id="name" name="name" --}}
            {{-- placeholder="Enter some name" required> --}}
        {{-- <p class="error text-center alert alert-danger hidden"></p> --}}
    {{-- </div> --}}
    {{--  --}}
        
    {{-- </div> --}}
{{-- </div> --}}
<button class="btn btn-primary move-up" style="margin-left: 630px" type="submit" id="add">
      Add a Title &nbsp;<span class="glyphicon glyphicon-plus"></span> 
    </button>&nbsp;&nbsp;&nbsp;
    {{-- <div class="col-md-7"> --}}
      <a href="{{ url("/") }}" class="btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-home"></span></a>
  {{-- </div> --}}
    
    
  </div>
{{-- </div> --}}
     
 {{-- <div class="container"> --}}
<div class="row body-background">
<br>

    {{-- <table id="example" class="display" cellspacing="0" width="100%"> --}}
    {{-- <table id="example" class="table table-striped table-bordered"> --}}
    <div class="container">
    <table id="mytitles-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>
      <tr>
        {{-- <th>ID</th> --}}
        <th>Type</th>
        <th>Title</th>
        <th class="text-right" width="20%">Action</th>
      </tr>
    </thead>

    <tbody>
        @if (!$titles->count())
            <h3 class="text-center move-up">There are no titles to display</h1> <br>
        @endif
        
        @foreach ($titles as $title)
          <tr>
           
           {{-- <td>{{ $title->id }}</td> --}}
           <td>{{ $title->type }}</td>
           <td>{{ $title->title }}</td>
           {{-- <td>{{ 'test action' }}</td> --}}
            <td>
              <span class="pull-right">
              <button class="edit-modal btn btn-info" data-info="{{$title->id}}, {{$title->type}}, {{$title->title}}">
              <span class="glyphicon glyphicon-edit"></span> Edit
              </button>
              <button class="delete-modal btn btn-danger" style="margin-left:10px" data-info="{{$title->id}}, {{$title->type}}, {{$title->title}}">
              <span class="glyphicon glyphicon-trash"></span> Delete
              </button>
            </span>
            </td>
          </tr>
        @endforeach
    </tbody>
    </table>

    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

{{-- </div> --}}
    @endsection

{{-- </div> --}}
   {{-- @include('partials/_footer')
</div>
</body>
</html> --}}
