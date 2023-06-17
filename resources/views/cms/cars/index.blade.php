@extends('cms.parent')

@section('title', 'Index car')

@section('sub-title', 'Index car')

@section('left-title', 'Index car')

@section('style')

@endsection


@section('content')
    <div class="card-header">
        <h3 class="card-title mt-2 mr-2">Car Table</h3>
        <div></div>
        <a type="submit" class="btn btn-success mb-2" href ="{{ route('cars.create') }}" ><i class="fas fa-plus-circle nav-icon"></i> Create New car</a>
        <a type="submit" class="btn btn-danger  mb-2 ml-5" href ="/cms/admin/cars_recycle" >  <i class="fas fa-trash-alt"></i> Recycle Bin</a>

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
                    <th>Supplier Name</th>
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
                        <td>{{ $car->supplier->user->first_name . ' ' . $car->supplier->user->last_name }}</td>

                        <td><a type="button" class="btn btn-info"
                                style="margin-right: 5px;"href="{{ route('cars.edit', $car->id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a> <a type="button" onclick="performDestroy({{ $car->id }}, this) " class="btn btn-danger" style="margin-right: 5px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a><a type="button" class="btn btn-success"
                                style="margin-right: 5px;"href="{{ route('cars.show', $car->id) }}">
                                <i class="far fa-eye"></i> show
                            </a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $cars->links() }}
    </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id,reference){
        let url = '/cms/admin/cars/'+id;
        confirmDestroy(url,reference);
    }
</script>    
@endsection
