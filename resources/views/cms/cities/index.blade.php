@extends('cms.parent')

@section('title' , 'Index City' )

@section('main-title' , 'Index City')

@section('sub-title' , 'Index City')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('cities.create') }}" type="submit" class="btn btn-success">Add New City</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>City Name</th>
                <th>Country Name</th>
                <th>Number of Cars Shows</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{$city->name}}</td>
                    <td>{{ $city->country->name}}</td>
                    <td>{{ $city->car_shows_count}}</td>
                    <td>
                    <a href="{{ route('cities.edit' , $city->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    <button type="button" onclick="performDestroy({{$city->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                    <a href="{{ route('cities.show' , $city->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
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
  {{ $cities->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/cities/'+id , reference);
        }
    </script>

@endsection

