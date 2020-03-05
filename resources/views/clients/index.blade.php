@extends('layout')


@section('content')

<h2>Our Records</h2>

<br>
<p>
    <a class="btn btn-primary" href="{{ route('currentClients.index') }}">Back</a>
</p>

 <table class="table table-dark" width="400px">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Room No</th>
        <th scope="col">Price</th>
        <th scope="col">Entry</th>
        <th scope="col">Departure</th>
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
                <td>{{ $client->updated_at->format('Y-m-d') }} 
					
					
					<p>
						Leave: {{ $client->updated_at->diffForHumans() }}
					</p>
					
					
				</td>
            </tr>
        </tbody>
        @empty
            No Data Found
        @endforelse
    
  </table>

 

   {{ $clients->links() }}
  

@endsection