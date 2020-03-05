@extends('layout')


@section('content')

<h2>Room List</h2>

<br>
<p>
    <a class="btn btn-primary" href="{{ route('rooms.create') }}">Add New Room</a>
    <a class="btn btn-primary" href="{{ route('clients.create') }}">Add New Clients</a>
    <a class="btn btn-primary" href="{{ route('available.index') }}">Available Rooms</a>
    <a class="btn btn-primary" href="{{ route('currentClients.index') }}">Current Clients</a>
</p>

 <table class="table table-dark" width="400px">
    <thead>
      <tr>
        <th scope="col">Room No</th>
        <th scope="col">Price</th>
        <th scope="col">People</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($rooms as $room)
            <tr>
                <td>{{ $room->room_no }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->people }}</td>
            
                <td>
                    <a href="{{ route('rooms.edit', ['room' => $room->id]) }}" class="btn btn-info btn-block">Edit</a>
                </td>
                <td>
                    <form action="{{ route('rooms.destroy', ['room' => $room->id]) }}" 
                        onsubmit="return confirm('Are you sure?')" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            No Data Found
        @endforelse
    </tbody>
  </table>

  

@endsection