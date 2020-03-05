@extends('layout')


@section('content')

<h2>Available Room List</h2>

<br>
<p>
    <a class="btn btn-primary" href="{{ route('clients.create') }}">Add New Clients</a>
    <a class="btn btn-primary" href="{{ route('rooms.index') }}">Back</a>
</p>

 <table class="table table-dark" width="400px">
    <thead>
      <tr>
        <th scope="col">Room No</th>
        <th scope="col">Price</th>
        <th scope="col">People</th>
      </tr>
    </thead>
    
        @forelse ($rooms as $room)
        <tbody>
            <tr>              
                <td>{{ $room->room_no }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->people }}</td>
            </tr>
        </tbody>
        @empty
            No Data Found
        @endforelse
    
  </table>

  

@endsection