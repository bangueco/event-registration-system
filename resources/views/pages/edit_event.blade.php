@extends('template.default')

@section('title', 'View')

@section('content')
<form action="{{ route('edit.event') }}" method="post">
  @csrf
  <div>
    <label for="id">ID: </label>
    <input type="text" name="id" id="id" readonly value="{{ $_GET['id'] }}">
  </div>
  <div>
    <label for="event_name">Event Name: </label>
    <input type="text" name="event_name" id="event_name" value="{{ $_GET['event_name'] }}">
  </div>
  <div>
    <label for="venue">Venue: </label>
    <input type="text" name="venue" id="venue" value="{{ $_GET['venue'] }}">
  </div>
  <div>
    <label for="starting_on">Starting On: </label>
    <input type="date" name="starting_on" id="starting_on" value="{{ $_GET['starting_on'] }}">
  </div>
  <button class="editButton">Submit</button>
</form>
@endsection