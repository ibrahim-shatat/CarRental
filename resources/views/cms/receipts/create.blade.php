@extends('cms.parent')

@section('title' , 'Create Receipt' )

@section('main-title' , 'Create Receipt')

@section('sub-title' , 'Create Receipt')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Receipt</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Receipt Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of Receipt">
                </div>
                <div class="form-group">
                  <label for="receipt_time">Receipt Time</label>
                  <input type="time" class="form-control" id="receipt_time" name="receipt_time" placeholder="Enter Time of Receipt">
                </div>
                <div class="form-group">
                  <label for="receipt_date">Receipt Date</label>
                  <input type="date" class="form-control" id="receipt_date" name="receipt_date" placeholder="Enter Date of Receipt">
                </div>
                <div class="form-group col-md-6">
                    <label for="payment_method"> Paymernt Method</label>
                    <select class="form-select form-select-sm" name="payment_method" style="width: 100%;"
                        id="payment_method" aria-label=".form-select-sm example">
                        <option value="cash">Cash</option>
                        <option value="visa">Visa </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Buyer Name</label>
                    <select class="form-control select2" id="buyer_id" name="buyer_id" style="width: 100%;">
                        @foreach ($buyers as $buyer)
                        <option value="{{ $buyer->id }}">{{ $buyer->user->first_name . ' ' . $buyer->user->last_name }}</option>
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
              </div>
              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('receipts.index') }}" type="submit" class="btn btn-danger">Go Back</a>
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
        function performStore(){
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('receipt_time',document.getElementById('receipt_time').value);
            formData.append('receipt_date',document.getElementById('receipt_date').value);
            formData.append('payment_method',document.getElementById('payment_method').value);
            formData.append('buyer_id',document.getElementById('buyer_id').value);
            formData.append('car_id',document.getElementById('car_id').value);
            store('/cms/admin/receipts',formData);
        }


    </script>

@endsection

