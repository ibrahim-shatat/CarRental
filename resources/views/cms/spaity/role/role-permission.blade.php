@extends('cms.parent')

@section('title' , 'Roles')

@section('main-title' , 'Roles')

@section('small-title' , 'Roles')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header ">
                        <h3 class="card-title"></h3>
                        {{-- <a href="{{ route('roles.index') }}" type="button"  class="btn btn-success">الأدوار</a> --}}



                        </div>
                     </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered table-striped text-nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th> Guard Name</th>
                              <th> Permission</th>
                              <th> Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                              {{-- <span class="tag tag-success">Approved</span>s --}}
                              <td>{{$permission->id}}</td>
                              <td>{{$permission->name}}</td>
                              <td>{{$permission->guard_name}}</td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="permission_{{$permission->id}}"
                                    onchange="storeRolePermission({{$roleId}},{{$permission->id}})" @if($permission->active) checked
                                  @endif>
                                  <label for="permission_{{$permission->id}}">
                                  </label>
                                </div>
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
              </div>
            </section>
            @endsection

            @section('scripts')

            <script>
              function storeRolePermission(roleId, permissionId){
                let data = {
                  permission_id: permissionId,
                };

                store('/cms/admin/roles/'+roleId+'/permissions',data);

              }
            </script>
            @endsection
