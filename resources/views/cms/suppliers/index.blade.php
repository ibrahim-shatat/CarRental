@extends('cms.parent')

@section('title' , 'Index Supplier')

@section('main-title' , 'Index Supplier')

@section('sub-title' , 'Index Supplier')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              @can('Create Supplier')
              <a href="{{ route('suppliers.create') }}" type="submit" class="btn btn-success">Add New Supplier</a>

              @endcan

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>email</th>
                    <th>Gender</th>
                    <th>city</th>
                    <th>Setting</th>
                  </tr>
                </thead>
                <tbody>
                  @if (Auth::guard('admin')->id())
                      @foreach ($suppliers as $supplier)
                          <tr>
                              <td>{{ $supplier->id }}</td>
                              <td>
                                  <img class="img-circle img-bordered-sm"
                                      src="{{ asset('storage/images/supplier/' . $supplier->user->image ?? '') }}"
                                      width="60" height="60" alt="User Image">
                              </td>
                              <td>{{ $supplier->user->first_name  . ' ' . $supplier->user->last_name}}</td>
                              <td>{{ $supplier->email}}</td>
                              <td>{{ $supplier->user->gender ?? ''}}</td>
                              <td>{{ $supplier->user->city->name ?? ''}}</td>
                              <td>
                                  <a href="{{ route('suppliers.edit', $supplier->id) }}" type="button"
                                      class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                  <button type="button" onclick="performDestroy({{ $supplier->id }} , this)"
                                      class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                  <a href="{{ route('suppliers.show', $supplier->id) }}" type="button"
                                      class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                              </td>
                          </tr>
                      @endforeach
                      {{ $suppliers->links() }}

                  @elseif (Auth::guard('supplier')->id())
                  <tr>
                      <td>{{ Auth::guard('supplier')->id()}}</td>
                      <td>
                          <img class="img-circle img-bordered-sm"
                              src="{{  asset('storage/images/supplier/'.auth('supplier')->user()->images) }}"
                              width="60" height="60" alt="User Image">
                      </td>
                      <td>{{auth('supplier')->user()->full_name }}</td>
                      <td>{{auth('supplier')->user()->email }}</td>
                      <td>{{auth('supplier')->user()->gender }}</td>
                      <td>{{ auth('supplier')->user()->city_name }}</td>
                      <td>
                          
                          <a href="{{ route('suppliers.edit', Auth::guard('supplier')->id()) }}" type="button"
                              class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                          <button type="button" onclick="performDestroy(Auth::guard('supplier')->id() , this)"
                              class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                          <a href="{{ route('suppliers.show', Auth::guard('supplier')->id()) }}" type="button"
                              class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                      </td>
                      @endif
                  </tr>
                  </tbody>
              </table>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection


@section('scripts')

<script>
  function performDestroy(id , reference){

    confirmDestroy('/cms/admin/suppliers/'+id , reference);
  }
  </script>
@endsection