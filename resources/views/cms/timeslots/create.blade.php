@extends('cms.parent')

@section('title' , 'Create Time_Slot' )

@section('main-title' , 'Create Time_Slot')

@section('sub-title' , 'Create Time_Slot')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Time_Slot</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="start_hour">Time_Slot Start Hour</label>
                  <input type="time" class="form-control" id="start_hour" name="start_hour" placeholder="Enter start_hour of Time_slot">
                </div>
                <div class="form-group">
                  <label for="end_hour">Time_slot Time</label>
                  <input type="time" class="form-control" id="end_hour" name="end_hour" placeholder="Enter end_hour of Time_slot">
                </div>
                <div class="form-group">
                  <label for="start_day">Time_Slot start day</label>
                  <input type="date" class="form-control" id="start_day" name="start_day" placeholder="Enter start_day of Time_slot">
                </div>
                <div class="form-group">
                    <label for="end_day">Time_Slot end day</label>
                    <input type="date" class="form-control" id="end_day" name="end_day" placeholder="Enter end_day of Time_slot">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('timeslots.index') }}" type="submit" class="btn btn-danger">Go Back</a>
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
            formData.append('start_hour',document.getElementById('start_hour').value);
            formData.append('end_hour',document.getElementById('end_hour').value);
            formData.append('start_day',document.getElementById('start_day').value);
            formData.append('end_day',document.getElementById('end_day').value);
            store('/cms/admin/timeslots',formData);
        }


    </script>

@endsection

