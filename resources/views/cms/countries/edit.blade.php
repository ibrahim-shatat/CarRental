@extends('cms.parent')

@section('title' , 'Edit Country' )

@section('main-title' , 'Edit Country')

@section('sub-title' , 'Edit Country')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of Country</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Country Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $countries->name }}" placeholder="Enter Name of Country">
                </div>
                <div class="form-group">
                  <label for="code">Country Code</label>
                  <input type="text" class="form-control" id="code" name="code" value="{{ $countries->code }}" placeholder="Enter Code of Country">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $countries->id  }})" class="btn btn-primary">Update</button>
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
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('code',document.getElementById('code').value);
        storeRoute('/cms/admin/countries_update/'+id,formData);
    }


</script>

@endsection

