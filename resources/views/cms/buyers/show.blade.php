@extends('cms.parent')

@section('title' , 'Show Buyer' )

@section('main-title' , 'Show Buyer')

@section('sub-title' , 'Show Buyer')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of Buyer</h3>
            </div>
            <form>
                <div class="form-group col-md-6">
                    <label for="first_name">First Name of Buyer</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" disabled
                        value="{{ $buyers->user->first_name }}" placeholder="Enter First Name of Buyer">
                </div>

                <div class="form-group col-md-6">
                    <label for="last_name">Last Name of Buyer</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" disabled
                        value="{{ $buyers->user->last_name }}" placeholder="Enter Last Name of Buyer">
                </div>


                <div class="form-group col-md-6">
                    <label for="email"> Email</label>
                    <input type="email" class="form-control" id="email" name="email" disabled
                        value="{{ $buyers->email }}" placeholder="Enter Your Email">
                </div>

                <div class="form-group col-md-6">
                    <label for="mobile"> Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" disabled
                        value="{{ $buyers->user->mobile }}" placeholder="Enter Your Mobile">
                </div>

                <div class="form-group col-md-6">
                    <label for="age"> age</label>
                    <input type="number" class="form-control" id="age" name="age" disabled
                        value="{{ $buyers->user->age }}" placeholder="Enter Your age">
                </div>

                <div class="form-group col-md-6">
                    <label for="gender"> Gender</label>
                    <select class="form-select form-select-sm" name="gender" style="width: 100%;"
                        id="gender" disabled aria-label=".form-select-sm example">
                        <option selected> {{ $buyers->user->gender }} </option>

                        <option value="male">Male</option>
                        <option value="female">Female </option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>City Name</label>
                    <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;"
                        disabled>
                        @foreach ($cities as $city)
                            <option @if ($city->id == $buyers->user->city_id) selected @endif
                                value="{{ $city->id }}">
                                {{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

            </form>
            <div class="card-footer">
                <a href="{{ route('buyers.index') }}" type="submit" class="btn btn-danger">Go Back</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')

@endsection

