@extends('cms.parent')

@section('title' , 'Index Reservation' )

@section('main-title' , 'Index Reservation')

@section('sub-title' , 'Index Reservation')


@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('reservations.create') }}" type="submit" class="btn btn-success">Add New Reservation</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Reservation Name</th>
                <th>Renter Name</th>
                <th>Car Name</th>
                <th>Payment Method</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{$reservation->name}}</td>
                    <td>{{ $reservation->renter->user->first_name .' '.$reservation->renter->user->last_name  }}</td>
                    <td>{{ $reservation->car->name }}</td>
                    <td>{{ $reservation->payment_method }}</td>
                    <td>
                            <a href="{{ route('reservations.edit' , $reservation->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" onclick="performDestroy({{$reservation->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <a href="{{ route('reservations.show' , $reservation->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
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
  {{ $reservations->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/reservations/'+id , reference);
        }
    </script>

@endsection

