@extends('cms.parent')

@section('title' , 'Create Country' )

@section('main-title' , 'Create Country')

@section('sub-title' , 'Create Country')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Country</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Country Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of Country">
                </div>
                <div class="form-group">
                  <label for="code">Country Code</label>
                  <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code of Country">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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

    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('code',document.getElementById('code').value);
            store('/cms/admin/countries',formData);
        }


    </script>

@endsection

