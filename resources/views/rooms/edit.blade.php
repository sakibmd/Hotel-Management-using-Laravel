@extends('layout')


@section('content')


<h2>Update Room</h2>
<br>
    
    <form action="{{ route('rooms.update', ['room' => $room->id] ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Room No</label>
            <input  name="room_no" placeholder="Room No" value="{{ old('room_no', $room->room_no) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="roll">Price</label>
            <input  name="price" placeholder="Enter Price" value="{{ old('price', $room->price) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="section">People</label>
            <input  name="people" placeholder="Enter People" value="{{ old('people', $room->people) }}" class="form-control">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <button type="submit" class="btn btn-info">Update</button>
    </form>

@endsection