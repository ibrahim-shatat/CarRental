@extends('cms.parent')

@section('title' , 'Index Review' )

@section('main-title' , 'Index Review')

@section('sub-title' , 'Index Review')


@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('reviews.create') }}" type="submit" class="btn btn-success">
                <i class="fas fa-plus-circle nav-icon"></i>
       
                Add New Review</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Review Percentege</th>
                <th>Renter Name</th>
                <th>Car Name</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($reviews as $Review)
                <tr>
                    <td>{{ $Review->id }}</td>
                    <td>{{$Review->stars}}</td>
                    <td>{{ $Review->renter->user->first_name .' '.$Review->renter->user->last_name  }}</td>
                    <td>{{ $Review->car->name }}</td>
                    <td>
                            <a href="{{ route('reviews.edit' , $Review->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" onclick="performDestroy({{$Review->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <a href="{{ route('reviews.show' , $Review->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
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
  {{ $reviews->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/reviews/'+id , reference);
        }
    </script>

@endsection

