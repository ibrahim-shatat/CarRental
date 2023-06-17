@extends('cms.parent')

@section('title' , 'Index Receipt' )

@section('main-title' , 'Index Receipt')

@section('sub-title' , 'Index Receipt')


@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('receipts.create') }}" type="submit" class="btn btn-success">
                <i class="fas fa-plus-circle nav-icon"></i>
       
                Add New Receipt</a>
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
                <th>Receipt Name</th>
                <th>Buyer Name</th>
                <th>Car Name</th>
                <th>Payment Method</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($receipts as $Receipt)
                <tr>
                    <td>{{ $Receipt->id }}</td>
                    <td>{{$Receipt->name}}</td>
                    <td>{{ $Receipt->buyer->user->first_name .' '.$Receipt->buyer->user->last_name  }}</td>
                    <td>{{ $Receipt->car->name }}</td>
                    <td>{{ $Receipt->payment_method }}</td>
                    <td>
                            <a href="{{ route('receipts.edit' , $Receipt->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" onclick="performDestroy({{$Receipt->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <a href="{{ route('receipts.show' , $Receipt->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
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
  {{ $receipts->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/receipts/'+id , reference);
        }
    </script>

@endsection

