@extends('cms.parent')

@section('title' , 'Create Review' )

@section('main-title' , 'Create Review')

@section('sub-title' , 'Create Review')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Review</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="stars">Review Percentege</label>
                        <input type="number"  class="form-control" id="stars" name="stars"  placeholder="Enter Percentege of Review">
                    </div>
                    <div class="form-group">
                        <label for="article">Review Article (optinal)</label>
                        <input type="text"  class="form-control" id="article"  name="article" placeholder="Enter Article of Review">
                    </div>
                   
                    <div class="form-group">
                        <label>Renter Name</label>
                        <select   class="form-control select2" id="renter_id" name="renter_id" style="width: 100%;" > 
                            @foreach ($renters as $renter)
                            <option value="{{ $renter->id }}">{{ $renter->user->first_name . ' ' . $renter->user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Car Name</label>
                        <select  class="form-control select2" id="car_id" name="car_id" style="width: 100%;">
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
              <div class="card-footer">
              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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

    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('stars',document.getElementById('stars').value);
            formData.append('article',document.getElementById('article').value);
            formData.append('renter_id',document.getElementById('renter_id').value);
            formData.append('car_id',document.getElementById('car_id').value);
            store('/cms/admin/reviews',formData);
        }


    </script>

@endsection

