@extends('template.default')

@section('title', 'Home')

@section('content')
<h1>Events</h1>
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
          <button id="joinButton" href="#" data-id=" {{ $data->_id    }}">Join</button>
          <button id="viewButton" href="#">View</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script>
  $(document).on('click', '#joinButton', function(e) {
    e.preventDefault();
    const url = "{{ route('join.event') }}";
    $.ajax({
      type: "POST",
      url: url,
      data: {
        '_token': "{{csrf_token()}}",
        'id': e.target.dataset.id
      },

      success: function(data) {
        alert(data);
      }
    })
  })
</script>
@endsection