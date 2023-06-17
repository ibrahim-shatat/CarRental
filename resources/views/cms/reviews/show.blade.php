@extends('cms.parent')

@section('title' , 'Show Review' )

@section('main-title' , 'Show Review')

@section('sub-title' , 'Show Review')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of Review</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="stars">Review Percentege</label>
                        <input type="number" disabled class="form-control" id="stars" name="stars" value="{{ $reviews->stars }}" placeholder="Enter Name of Review">
                    </div>
                    <div class="form-group">
                        <label for="article">Review Article</label>
                        <input type="text" disabled class="form-control" id="article"value="{{ $reviews->article }}" name="article" placeholder="null">
                    </div>
                   
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
                  </div>
              <div class="card-footer">
                <a href="{{ route('reviews.index') }}" type="submit" class="btn btn-danger">Go Back</a>
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

