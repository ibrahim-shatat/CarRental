@extends('cms.parent')

@section('title' , 'Edit Reservation' )

@section('main-title' , 'Edit Reservation')

@section('sub-title' , 'Edit Reservation')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of Reservation</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                    <label for="name">Reservation Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $reservations->name }}" placeholder="Enter Name of Reservation">
                </div>
                <div class="form-group">
                    <label for="reservation_time">Reservation Time</label>
                    <input type="time" class="form-control" id="reservation_time"value="{{ $reservations->reservation_time }}" name="reservation_time" placeholder="Enter Time of Reservation">
                </div>
                <div class="form-group">
                    <label for="reservation_date">Reservation Date</label>
                    <input type="date" class="form-control" id="reservation_date" name="reservation_date" value="{{ $reservations->reservation_date }}" placeholder="Enter Date of Reservation">
                </div>
                <div class="form-group col-md-6">
                    <label for="payment_method"> Payment Method</label>
                    <select class="form-select form-select-sm" name="payment_method" style="width: 100%;" value="{{ $reservations->payment_method }}"
                        id="payment_method" aria-label=".form-select-sm example">
                        <option value="cash">Cash</option>
                        <option value="visa">Visa </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Renter Name</label>
                    <select class="form-control select2" id="renter_id" name="renter_id" style="width: 100%;" > 
                        @foreach ($renters as $renter)
                        <option value="{{ $renter->id }}">{{ $renter->user->first_name . ' ' . $renter->user->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Car Name</label>
                    <select class="form-control select2" id="car_id" name="car_id" style="width: 100%;">
                        @foreach ($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Time Slot id</label>
                    <select class="form-control select2" id="time_slot_id" name="time_slot_id" style="width: 100%;">
                        @foreach ($time_slots as $time_slot)
                            <option value="{{ $time_slot->id }}">{{ $time_slot->id }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $reservations->id  }})" class="btn btn-primary">Update</button>
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

<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('reservation_time',document.getElementById('reservation_time').value);
        formData.append('reservation_date',document.getElementById('reservation_date').value);
        formData.append('payment_method',document.getElementById('payment_method').value);
        formData.append('renter_id',document.getElementById('renter_id').value);
        formData.append('car_id',document.getElementById('car_id').value);
        formData.append('time_slot_id',document.getElementById('time_slot_id').value);
        storeRoute('/cms/admin/reservations_update/'+id,formData);
    }


</script>

@endsection

