@extends('template.default')

@section('title', 'Manage Events')

@section('content')
<form action="{{ route('create.event') }}" method="post">
  @csrf
  <div>
    <label for="event_name">Event Name: </label>
    <input type="text" name="event_name" id="event_name">
  </div>
  <div>
    <label for="venue">Venue: </label>
    <input type="text" name="venue" id="venue">
  </div>
  <div>
    <label for="starting_on">Starting On: </label>
    <input type="date" name="starting_on" id="starting_on">
  </div>
  <button>Submit</button>
</form>
@endsection