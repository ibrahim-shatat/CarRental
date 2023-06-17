@extends('cms.parent')

@section('title' , 'Show City' )

@section('main-title' , 'Show City')

@section('sub-title' , 'Show City')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of City</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                    <label for="name">Country Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cities->country->name }}" disabled >
                  </div>
                <div class="form-group">
                  <label for="name">City Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $cities->name }}" disabled >
                </div>
              </div>
              <div class="card-footer">
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

@endsection

