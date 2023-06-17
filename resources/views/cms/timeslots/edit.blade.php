@extends('cms.parent')

@section('title' , 'Edit Time_Slot' )

@section('main-title' , 'Edit Time_Slot')

@section('sub-title' , 'Edit Time_Slot')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of Time_slot</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                    <label for="start_hour">Time_Slot Start Hour</label>
                    <input type="time" value="{{ $time_slots->start_hour }}" class="form-control" id="start_hour" name="start_hour" placeholder="Enter start_hour of Time_slot">
                  </div>
                  <div class="form-group">
                    <label for="end_hour">Time_Slot End Hour</label>
                    <input type="time" value="{{ $time_slots->end_hour }}" class="form-control" id="end_hour" name="end_hour" placeholder="Enter start_hour of Time_slot">
                  </div>
                  <div class="form-group">
                    <label for="start_day">Time_Slot Start Day</label>
                    <input type="date" value="{{ $time_slots->start_day }}"class="form-control" id="start_day" name="start_day" placeholder="Enter start_day of Time_slot">
                  </div>
                  <div class="form-group">
                    <label for="end_day">Time_Slot End Day</label>
                    <input type="date" value="{{ $time_slots->end_day }}"class="form-control" id="end_day" name="end_day" placeholder="Enter start_day of Time_slot">
                  </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $time_slots->id  }})" class="btn btn-primary">Update</button>
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
    function performUpdate(id){
        let formData = new FormData();
        formData.append('start_hour',document.getElementById('start_hour').value);
        formData.append('end_hour',document.getElementById('end_hour').value);
        formData.append('start_day',document.getElementById('start_day').value);
        formData.append('end_day',document.getElementById('end_day').value);
        storeRoute('/cms/admin/timeslots_update/'+id,formData);
    }


</script>

@endsection

