@extends('cms.parent')

@section('title' , 'Show Receipt' )

@section('main-title' , 'Show Receipt')

@section('sub-title' , 'Show Receipt')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of Receipt</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Receipt Name</label>
                        <input type="text" disabled class="form-control" id="name" name="name" value="{{ $receipts->name }}" placeholder="Enter Name of Receipt">
                    </div>
                    <div class="form-group">
                        <label for="receipt_time">Receipt Time</label>
                        <input type="time" disabled class="form-control" id="receipt_time"value="{{ $receipts->receipt_time }}" name="receipt_time" placeholder="Enter Time of Receipt">
                    </div>
                    <div class="form-group">
                        <label for="receipt_date">Receipt Date</label>
                        <input type="date" disabled class="form-control" id="receipt_date" name="receipt_date" value="{{ $receipts->receipt_date }}" placeholder="Enter Date of Receipt">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="paymernt_method"> Payment Method</label>
                        <select disabled class="form-select form-select-sm" name="payment_method" style="width: 100%;" value="{{ $receipts->payment_method }}"
                            id="payment_method" aria-label=".form-select-sm example">
                            <option value="cash">Cash</option>
                            <option value="visa">Visa </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Buyer Name</label>
                        <select  disabled class="form-control select2" id="buyer_id" name="buyer_id" style="width: 100%;" > 
                            @foreach ($buyers as $buyer)
                            <option value="{{ $buyer->id }}">{{ $buyer->user->first_name . ' ' . $buyer->user->last_name }}</option>
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
                  </div>
              <div class="card-footer">
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

@endsection

