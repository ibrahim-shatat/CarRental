@extends('cms.parent')

@section('title' , 'Show Reservation' )

@section('main-title' , 'Show Reservation')

@section('sub-title' , 'Show Reservation')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of Reservation</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Reservation Name</label>
                        <input type="text" disabled class="form-control" id="name" name="name" value="{{ $reservations->name }}" placeholder="Enter Name of Reservation">
                    </div>
                    <div class="form-group">
                        <label for="reservation_time">Reservation Time</label>
                        <input type="time" disabled class="form-control" id="reservation_time"value="{{ $reservations->reservation_time }}" name="reservation_time" placeholder="Enter Time of Reservation">
                    </div>
                    <div class="form-group">
                        <label for="reservation_date">Reservation Date</label>
                        <input type="date" disabled class="form-control" id="reservation_date" name="reservation_date" value="{{ $reservations->reservation_date }}" placeholder="Enter Date of Reservation">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="payment_method"> Payment Method</label>
                        <input type="text" disabled class="form-control" id="payment_method" name="payment_method" value="{{ $reservations->payment_method }}" placeholder="Enter Date of Reservation">

                    <div class="form-group">
                        <label>Renter Name</label>
                        <select  disabled class="form-control select2" id="renter_id" name="renter_id" style="width: 100%;" > 
                            @foreach ($renters as $renter)
                            <option value="{{ $renter->id }}">{{ $renter->user->first_name . ' ' . $renter->user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Car Name</label>
                        <select disabled class="form-control select2" id="car_id" name="car_id" style="width: 100%;">
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Time Slot id</label>
                        <select disabled class="form-control select2" id="time_slot_id" name="time_slot_id" style="width: 100%;">
                            @foreach ($time_slots as $time_slot)
                                <option value="{{ $time_slot->id }}">{{ $time_slot->id }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
              <div class="card-footer">
                <a href="{{ route('reservations.index') }}" type="submit" class="btn btn-danger">Go Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')

@endsection

