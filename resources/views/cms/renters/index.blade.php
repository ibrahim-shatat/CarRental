@extends('cms.parent')

@section('title', 'Index Renter')

@section('main-title', 'Index Renter')

@section('sub-title', 'Index Renter')

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

                            <a href="{{ route('renters.create') }}" type="submit" class="btn btn-success">Add New Renter</a>

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
                                        <th>City Name</th>
                                        <th>Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Auth::guard('admin')->id())
                                        @foreach ($renters as $renter)
                                            <tr>
                                                <td>{{ $renter->id }}</td>
                                                <td>
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{ asset('storage/images/renter/' . $renter->user->image ?? '') }}"
                                                        width="60" height="60" alt="User Image">
                                                </td>
                                                <td>{{ $renter->user->first_name  . ' ' . $renter->user->last_name}}</td>
                                                <td>{{ $renter->email}}</td>
                                                <td>{{ $renter->user->gender ?? ''}}</td>
                                                <td>{{ $renter->user->city->name ?? ''}}</td>
                                                <td>
                                                    
                                                    <a href="{{ route('renters.edit', $renter->id) }}" type="button"
                                                        class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                    <button type="button" onclick="performDestroy({{ $renter->id }} , this)"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                                    <a href="{{ route('renters.show', $renter->id) }}" type="button"
                                                        class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{ $renters->links() }}
                  
                                    @elseif (Auth::guard('renter')->id())
                                    <tr>
                                        <td>{{ Auth::guard('renter')->id()}}</td>
                                        <td>
                                            <img class="img-circle img-bordered-sm"
                                                src="{{  asset('storage/images/renter/'.auth('renter')->user()->images) }}"
                                                width="60" height="60" alt="User Image">
                                        </td>
                                        <td>{{auth('renter')->user()->full_name }}</td>
                                        <td>{{auth('renter')->user()->email }}</td>
                                        <td>{{auth('renter')->user()->gender }}</td>
                                        <td>{{ auth('renter')->user()->city_name }}</td>
                                        <td>
                                            
                                            <a href="{{ route('renters.edit', Auth::guard('renter')->id()) }}" type="button"
                                                class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                            <button type="button" onclick="performDestroy(Auth::guard('renter')->id() , this)"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                            <a href="{{ route('renters.show', Auth::guard('renter')->id()) }}" type="button"
                                                class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                                        </td>
                                        @endif
                                    </tr>
                                    </tbody>
                            </table>
                        </div>

                        {{ $renters->links() }}
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
        function performDestroy(id, reference) {
            confirmDestroy('/cms/renter/renters/' + id, reference);
        }
    </script>
@endsection
