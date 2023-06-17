@extends('cms.parent')

@section('title', 'RecycleBin Car')

@section('sub-title', 'RecycleBin Car')

@section('left-title', 'RecycleBin Car')

@section('style')

@endsection


@section('content')
    <div class="card-header">
        <h3 class="card-title mt-2 mr-2">Car Table</h3>

    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>model</th>
                    <th>status</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>
                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/car/'.$car->image ?? "")}}" width="50" height="50" alt="Car Image">
                        </td>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->status }}</td>
                        <td><a type="submit" class="btn btn-info"
                                style="margin-right: 5px;" href = "cars_restore/{{$car->id }}">
                                <i class="fas fa-trash-restore"></i> Restore
                            </a> <a type="submit" href ="cars_delete/{{$car->id}}" class="btn btn-danger" style="margin-right: 5px;">
                                <i class="fas fa-trash-alt"></i> Permanent Deletion
                            </a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $cars->links() }}
    </div>
@endsection

@section('scripts')
  
@endsection
