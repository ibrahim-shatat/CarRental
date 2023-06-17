@extends('cms.parent')

@section('title' , 'Index Time_Slot' )

@section('main-title' , 'Index Time_Slot')

@section('sub-title' , 'Index Time_Slot')


@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('timeslots.create') }}" type="submit" class="btn btn-success">Add New Time_Slot</a>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Start Hour</th>
                <th>end Hour</th>
                <th>Start date</th>
                <th>end date</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($time_slots as $Time_slot)
                <tr>
                    <td>{{ $Time_slot->id }}</td>
                    <td>{{$Time_slot->start_hour}}</td>
                    <td>{{ $Time_slot->end_hour }}</td>
                    <td>{{ $Time_slot->start_day}}</td>
                    <td>{{ $Time_slot->end_day }}</td>
                    <td>
                            <a href="{{ route('timeslots.edit' , $Time_slot->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" onclick="performDestroy({{$Time_slot->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <a href="{{ route('timeslots.show' , $Time_slot->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  {{ $time_slots->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/timeslots/'+id , reference);
        }
    </script>

@endsection

