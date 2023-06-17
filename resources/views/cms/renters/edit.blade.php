@extends('cms.parent')

@section('title', 'Edit Renter')

@section('main-title', 'Edit Renter')

@section('sub-title', 'Edit Renter')

@section('styles')

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit New Renter</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="form-group col-md-6">
                                <label>Role Name</label>
                                <select class="form-control select2" id="role_id" name="role_id" style="width: 100%;">
                                    @foreach ($roles as $role)
                                        <option @if ($role->id == $renters->role_id) selected @endif value="{{ $role->id }}">
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name of Renter</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $renters->user->first_name }}" placeholder="Enter First Name of Renter">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name of Renter</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $renters->user->last_name }}" placeholder="Enter Last Name of Renter">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="email"> Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $renters->email }}" placeholder="Enter Your Email">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mobile"> Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    value="{{ $renters->user->mobile }}" placeholder="Enter Your Mobile">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="age"> age</label>
                                <input type="number" class="form-control" id="age" name="age"
                                    value="{{ $renters->user->age }}" placeholder="Enter Your age">
                            </div>

                    <div class="form-group col-md-6">
                        <label for="gender"> Gender</label>
                        <select class="form-select form-select-sm" name="gender" style="width: 100%;" id="gender"
                            aria-label=".form-select-sm example">
                            <option selected> {{ $renters->user->gender }} </option>

                            <option value="male">Male</option>
                            <option value="female">Female </option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>City Name</label>
                        <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                            @foreach ($cities as $city)

                                <option @if ($city->id == $renters->user->city_id) selected @endif value="{{ $city->id }}">
                                    {{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="image"> Chosse Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Choose Image">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{ $renters->id }})"
                        class="btn btn-primary">Store</button>
                    <a href="{{ route('renters.index') }}" type="submit" class="btn btn-success">Go Back</a>

                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script>
        function performUpdate(id) {
            let formData = new FormData();
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('email', document.getElementById('email').value);
            //   formData.append('password',document.getElementById('password').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('age', document.getElementById('age').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('role_id', document.getElementById('role_id').value);
            storeRoute('/cms/admin/renters_update/' + id, formData)

        }
    </script>
@endsection
