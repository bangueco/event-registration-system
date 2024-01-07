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
<h1>Your Events</h1>
<div id="events__container">
  <table border="1">
    <thead>
      <tr>
        <th>Event Name</th>
        <th>Event By</th>
        <th>Venue</th>
        <th>Starting On</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $key => $data)
      <tr>
        <td>{{$data->event_name}}</td>
        <td>{{$data->event_by}}</td>
        <td>{{$data->venue}}</td>
        <td>{{$data->starting_on}}</td>
        <td>
          <button class="editButton" data-id="{{ $data->_id }}">Edit</button>
          <button class="deleteButton" data-id="{{ $data->_id }}">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script>
  $('.editButton').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "{{ route('get.event.info'); }}",
      data: {
        '_token': "{{csrf_token()}}",
        'id': e.target.dataset.id
      },

      success: function(data) {
        window.location.href = `{{ route('edit.event.page') }}?id=${data._id}&event_name=${data.event_name}&venue=${data.venue}&starting_on=${data.starting_on}`
      }
    });
  })
</script>
@endsection