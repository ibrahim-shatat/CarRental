@extends('cms.parent')

@section('title' , 'Create CarShow' )

@section('main-title' , 'Create CarShow')

@section('sub-title' , 'Create CarShow')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New CarShow</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                    <label>City Name</label>
                    <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label for="name">CarShow Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of CarShow">
                </div>
                <div class="form-group">
                  <label for="mobile">CarShow Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile of CarShow">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('car_shows.index') }}" type="submit" class="btn btn-danger">Go Back</a>
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
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('city_id',document.getElementById('city_id').value);
            store('/cms/admin/car_shows',formData);
        }


    </script>

@endsection

