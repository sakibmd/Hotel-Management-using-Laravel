@extends('layout')


@section('content')


<h2 style="text-align:center;">New Client Entry</h2>
<br>
    
    

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input  name="name" placeholder="Enter Name" value="{{ old('name') }}" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input  name="address" placeholder="Enter Address" value="{{ old('address') }}" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input  name="phone" placeholder="Enter Phone Number" value="{{ old('phone') }}" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label>Select Your Room</label>
                        <select class="form-control" name="room_no">
                            <option>Enter Rooms</option>
                          
                            @foreach ($rooms as $room)
                          
                              <option value="{{ $room->room_no }}"> 
                          
                                  {{ $room->room_no }} 
                          
                              </option>
                          
                            @endforeach    
                          
                          </select>
                    </div>
            
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input  name="price" placeholder="Enter Price" value="{{ old('price') }}" class="form-control">
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
            
                    <button type="submit" class="btn btn-info btn-block">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection