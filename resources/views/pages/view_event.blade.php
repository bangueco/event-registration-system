@extends('template.default')

@section('title', 'View')

@section('content')
<div class="container">
  @php
  $event = \App\Models\Event::where('_id', $_GET['id'])->get()[0];
  @endphp

  <div>Event Name: {{ $event->event_name }}</div>
  <div>Event By: {{ $event->event_by }}</div>
  <div>Venue: {{ $event->venue }}</div>
  <div>Starting On: {{ $event->starting_on }}</div>
  <div>Participants: {{ count($event->participants); }}</div>
</div>
@endsection