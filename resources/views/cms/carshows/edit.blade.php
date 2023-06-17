@extends('cms.parent')

@section('title' , 'Edit CarShow' )

@section('main-title' , 'Edit CarShow')

@section('sub-title' , 'Edit CarShow')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of CarShow</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label>City Name</label>
                  <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                      @foreach ($cities as $city)
                      <option @if ($city->id == $carshows->city_id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">CarShow Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $carshows->name }}" placeholder="Enter Name of CarShow">
                </div>
                <div class="form-group">
                  <label for="mobile">CarShow Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $carshows->mobile }}" placeholder="Enter Mobile of CarShow">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $carshows->id  }})" class="btn btn-primary">Update</button>
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
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('city_id',document.getElementById('city_id').value);
        storeRoute('/cms/admin/car_shows_update/'+id,formData);
    }
</script>

@endsection

