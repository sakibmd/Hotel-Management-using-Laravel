@extends('layout')


@section('content')

<h2>Current Client Records</h2>

<br>
<p>
    <a class="btn btn-primary" href="{{ route('clients.create') }}">Add New Clients</a>
    <a class="btn btn-primary" href="{{ route('available.index') }}">Available Rooms</a>
    <a class="btn btn-primary" href="{{ route('rooms.index') }}">Back</a>
</p>

 <table class="table table-dark" width="400px">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Room No</th>
        <th scope="col">Price</th>
        <th scope="col">Entry</th>
        <th scope="col"></th>
      </tr>
    </thead>
    
        @forelse ($clients as $client)
        <tbody>
            <tr>              
                <td>{{ $client->name }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->room_no }}</td>
                <td>{{ $client->price }}</td>
                <td>{{ $client->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('currentClients.edit', ['client' => $client->id] ) }}" onsubmit="return confirm('Are you sure?')" class="btn btn-info">Exit</a>
                </td>
            </tr>
        </tbody>
        @empty
            No Data Found
        @endforelse
    
  </table>

  

@endsection