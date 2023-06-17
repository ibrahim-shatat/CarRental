@extends('cms.parent')

@section('title' , 'Edit Reviews' )

@section('main-title' , 'Edit Reviews')

@section('sub-title' , 'Edit Reviews')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of Reviews</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                    <label for="stars">Reviews Percentege (optional)</label>
                    <input type="number" class="form-control" id="stars" name="stars" value="{{ $reviews->stars }}" placeholder="Enter Name of Reviews">
                </div>
                <div class="form-group">
                    <label for="article">Reviews Article</label>
                    <input type="text" class="form-control" id="article"value="{{ $reviews->article }}" name="article" placeholder="Enter Time of Reviews">
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
              </div>
              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $reviews->id  }})" class="btn btn-primary">Update</button>
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
    function performUpdate(id){
      let formData = new FormData();
      formData.append('stars',document.getElementById('stars').value);
      formData.append('article',document.getElementById('article').value);
        formData.append('renter_id',document.getElementById('renter_id').value);
        formData.append('car_id',document.getElementById('car_id').value);
        storeRoute('/cms/admin/reviews_update/'+id,formData);
    }


</script>

@endsection

