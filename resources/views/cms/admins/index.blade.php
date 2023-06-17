@extends('cms.parent')

@section('title' , 'Index Admin')

@section('main-title' , 'Index Admin')

@section('sub-title' , 'Index Admin')

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

              <a href="{{ route('admins.create') }}" type="submit" class="btn btn-success">Add New Admin</a>

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
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>email</th>
                    <th>Gender</th>
                    <th>city</th>
                    <th>Setting</th>
                  </tr>
                </thead>
                <tbody>
                  @can('Index Admins')
                  @foreach($admins as $admin)
                  <tr>
                    <td>{{$admin->id}}</td>
                    <td>
                      <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->user->image ?? "")}}" width="60" height="60" alt="User Image">
                   </td>
                    <td>{{$admin->user->first_name.' '. $admin->user->last_name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->user->gender ?? ""}}</td>
                    <td>{{$admin->user->city->name ?? ""}}</td>
                    <td>

                        <a href="{{ route('admins.edit' , $admin->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" onclick="performDestroy({{$admin->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <a href="{{ route('admins.show' , $admin->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                      </td>
                  </tr>
                    {{ $admins->links() }}
                    @endforeach
                  @endcan
                  
                  @cannot('Index Admins')
                  <tr>
                    <td>{{ Auth::guard('admin')->id()}}</td>
                    <td>
                      <img class="img-circle img-bordered-sm"               
                      src="{{  asset('storage/images/admin/'.auth('admin')->user()->images) }}"
                      width="60" height="60" alt="User Image">
                   </td>
                    <td>{{auth('admin')->user()->full_name}}</td>
                    <td>{{auth('admin')->user()->email }}</td>
                    <td>{{auth('admin')->user()->gender }}</td>
                    <td>{{ auth('admin')->user()->city_name }}</td>
                    <td>

                        <a href="{{ route('admins.edit' , Auth::guard('admin')->id()) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" onclick="performDestroy(Auth::guard('admin')->id()) , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <a href="{{ route('admins.show' ,Auth::guard('admin')->id()) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                      </td>
                  </tr>
                  @endcannot

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

    confirmDestroy('/cms/admin/admins/'+id , reference);
  }
  </script>
@endsection