@extends('cms.parent')

@section('title', 'Index Buyer')

@section('main-title', 'Index Buyer')

@section('sub-title', 'Index Buyer')

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

                            <a href="{{ route('buyers.create') }}" type="submit" class="btn btn-success">Add New Buyer</a>
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
                                    @foreach ($buyers as $buyer)
                                        <tr>
                                            <td>{{ $buyer->id }}</td>
                                            <td>
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/images/buyer/' . $buyer->user->image ?? '') }}"
                                                    width="60" height="60" alt="User Image">
                                            </td>
                                            <td>{{ $buyer->user->first_name  . ' ' . $buyer->user->last_name}}</td>
                                            <td>{{ $buyer->email}}</td>
                                            <td>{{ $buyer->user->gender ?? ''}}</td>
                                            <td>{{ $buyer->user->city->name ?? ''}}</td>
                                            <td>
                                                <a href="{{ route('buyers.edit', $buyer->id) }}" type="button"
                                                    class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                <button type="button" onclick="performDestroy({{ $buyer->id }} , this)"
                                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                                <a href="{{ route('buyers.show', $buyer->id) }}" type="button"
                                                    class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @elseif (Auth::guard('buyer')->id())
                                <tr>
                                    <td>{{ Auth::guard('buyer')->id()}}</td>
                                    <td>
                                        <img class="img-circle img-bordered-sm"
                                            src="{{  asset('storage/images/buyer/'.auth('buyer')->user()->images) }}"
                                            width="60" height="60" alt="User Image">
                                    </td>
                                    <td>{{auth('buyer')->user()->full_name }}</td>
                                    <td>{{auth('buyer')->user()->email }}</td>
                                    <td>{{auth('buyer')->user()->gender }}</td>
                                    <td>{{ auth('buyer')->user()->city_name }}</td>
                                    <td>
                                        
                                        <a href="{{ route('buyers.edit', Auth::guard('buyer')->id()) }}" type="button"
                                            class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <button type="button" onclick="performDestroy(Auth::guard('buyer')->id() , this)"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                        <a href="{{ route('buyers.show', Auth::guard('buyer')->id()) }}" type="button"
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
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/buyers/' + id, reference);
        }
    </script>
@endsection
