@extends('cms.parent')

@section('title' , 'Create City' )

@section('main-title' , 'Create City')

@section('sub-title' , 'Create City')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New City</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                    <label>Country Name</label>
                    <select class="form-control select2" id="country_id" name="country_id" style="width: 100%;">
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label for="name">City Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of City">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
        function performStore(){
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('country_id',document.getElementById('country_id').value);
            store('/cms/admin/cities',formData);
        }


    </script>

@endsection

