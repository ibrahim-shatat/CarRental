@extends('cms.parent')

@section('title' , 'Show Time Slot' )

@section('main-title' , 'Show Time Slot')

@section('sub-title' , 'Show Time Slot')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of Time_slot</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="start_hour">Time_Slot Start Hour</label>
                        <input type="time" disabled  value="{{ $time_slots->start_hour }}" class="form-control" id="start_hour" name="start_hour" placeholder="Enter start_hour of Time_slot">
                      </div>
                      <div class="form-group">
                        <label for="end_hour">Time_Slot End Hour</label>
                        <input type="time" disabled value="{{ $time_slots->end_hour }}" class="form-control" id="end_hour" name="end_hour" placeholder="Enter start_hour of Time_slot">
                      </div>
                      <div class="form-group">
                        <label for="start_day">Time_Slot Start Day</label>
                        <input type="date" disabled value="{{ $time_slots->start_day }}"class="form-control" id="start_day" name="start_day" placeholder="Enter start_day of Time_slot">
                      </div>
                      <div class="form-group">
                        <label for="end_day">Time_Slot End Day</label>
                        <input type="date" disabled value="{{ $time_slots->end_day }}"class="form-control" id="end_day" name="end_day" placeholder="Enter start_day of Time_slot">
                      </div>
                    </div>
                <div class="card-footer">
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

@endsection

