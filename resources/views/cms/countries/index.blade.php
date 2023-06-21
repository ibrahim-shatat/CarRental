@extends('cms.parent')

@section('title' , 'Index Country' )

@section('main-title' , 'Index Country')

@section('sub-title' , 'Index Country')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('countries.create') }}" type="submit" class="btn btn-success">Add New Country</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Country Name</th>
                <th>Code</th>
                <th>Number of cities</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{$country->name}}</td>
                    <td>{{ $country->code }}</td>
                    <td>{{ $country->cities_count }}</td>
                    <td>
                        <a href="{{ route('countries.edit' , $country->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    <button type="button" onclick="performDestroy({{$country->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                    <a href="{{ route('countries.show' , $country->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
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
  {{ $countries->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/countries/'+id , reference);
        }
    </script>

@endsection

