@extends('cms.parent')

@section('title' , 'Show CarShow' )

@section('main-title' , 'Show CarShow')

@section('sub-title' , 'Show CarShow')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of CarShow</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $carshows->city->name }}" disabled >
                  </div>
                <div class="form-group">
                  <label for="name">CarShow Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $carshows->name }}" disabled >
                </div>
                <div class="form-group">
                  <label for="mobile">CarShow Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $carshows->mobile }}" disabled >
                </div>
              </div>
              <div class="card-footer">
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

@endsection

