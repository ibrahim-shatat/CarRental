@extends('cms.parent')

@section('title' , 'Show Country' )

@section('main-title' , 'Show Country')

@section('sub-title' , 'Show Country')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of Country</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Country Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $countries->name }}" disabled >
                </div>
                <div class="form-group">
                  <label for="code">Country Code</label>
                  <input type="text" class="form-control" id="code" name="code" value="{{ $countries->code }}" disabled >
                </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('countries.index') }}" type="submit" class="btn btn-danger">Go Back</a>
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

