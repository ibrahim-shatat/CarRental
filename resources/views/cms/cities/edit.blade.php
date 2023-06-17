@extends('cms.parent')

@section('title' , 'Edit City' )

@section('main-title' , 'Edit City')

@section('sub-title' , 'Edit City')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of City</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label>Country Name</label>
                  <select class="form-control select2" id="country_id" name="country_id" style="width: 100%;">
                      @foreach ($countries as $country)
                      <option @if ($country->id == $cities->country_id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">City Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $cities->name }}" placeholder="Enter Name of City">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $cities->id  }})" class="btn btn-primary">Update</button>
                <a href="{{ route('cities.index') }}" type="submit" class="btn btn-danger">Go Back</a>
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
        formData.append('country_id',document.getElementById('country_id').value);
        storeRoute('/cms/admin/cities_update/'+id,formData);
    }
</script>

@endsection

