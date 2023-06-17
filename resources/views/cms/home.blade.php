@extends('cms.parent')
@section('title', 'Home Page')

@section('styles')
    <style>
        a {
            color: black;
            font-weight: bold
        }

        a:hover {
            text-decoration: none;
        }
    </style>

@endsection
@section('content')


    <div class="container-fluid">
        
            <div class="row">
           <!-- col -->
                @php
                    use App\Models\Renter;
                    $count = Renter::count('id');
                @endphp

                @can('Create Renter')
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('renters.create') }}" class="info-box-icon bg-danger elevation-1"><i
                                class="fa-solid fas fa-user "></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('renters.create') }}" class="info-box-text">Number of Renters </a>
                            <a href="{{ route('renters.create') }}" class="info-box-number">{{ $count }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                @endcan
                <!-- /.col -->

                <!-- col -->
                @php
                    use App\Models\Buyer;
                    $count = Buyer::count('id');
                @endphp
                @can('Create Buyer')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('buyers.create') }}" class="info-box-icon bg-success elevation-1"><i
                                class="fas fa-user"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('buyers.create') }}" class="info-box-text">Number of Buyers </a>
                            <a href="{{ route('buyers.create') }}" class="info-box-number">{{ $count }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                @endcan

                <!-- /.col -->

                <!-- col -->
                @php
                    use App\Models\Supplier;
                    $sparCount = Supplier::count('id');
                @endphp
                @can('Create Supplier')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('suppliers.create') }}" class="info-box-icon bg-blue elevation-1"><i
                                class="fa-solid fas fa-user"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('suppliers.create') }}" class="info-box-text"> Number of Suppliers</a>
                            <a href="{{ route('suppliers.create') }}" class="info-box-number">{{ $sparCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                @endcan

                <!-- /.col -->

                <!-- col -->
                @php
                    use App\Models\Car;
                    $serCount = Car::count('id');
                @endphp
                @can('Create Car')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('cars.create') }}" class="info-box-icon bg-warning elevation-1"><i
                                class="fa-solid fas fa-car"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('cars.create') }}" class="info-box-text"> Number of Cars</a>
                            <a href="{{ route('cars.create') }}" class="info-box-number">{{ $serCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                @endcan

                @php
                    use App\Models\CarShow;
                    $sersCount = CarShow::count('id');
                @endphp
                @can('Create CarShow')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('car_shows.create') }}" class="info-box-icon bg-warning elevation-1"><i
                                class="fa-solid fas fa-warehouse"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('car_shows.create') }}" class="info-box-text"> Number of CarShows</a>
                            <a href="{{ route('car_shows.create') }}" class="info-box-number">{{ $sersCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                @endcan


                @php
                    use App\Models\Country;
                    $serCount = Country::count('id');
                @endphp
                @can('Create Country')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('countries.create') }}" class="info-box-icon bg-warning elevation-1"><i
                                class="fas fa-globe-europe"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('countries.create') }}" class="info-box-text"> Number of Countries</a>
                            <a href="{{ route('countries.create') }}" class="info-box-number">{{ $serCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                @endcan



                @php
                    use App\Models\City;
                    $serCount = City::count('id');
                @endphp
                @can('Create City')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('cities.index') }}" class="info-box-icon bg-warning elevation-1"><i
                                class="fa-solid fas fa-city"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('cities.create') }}" class="info-box-text"> Number of Cities</a>
                            <a href="{{ route('cities.create') }}" class="info-box-number">{{ $serCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                @endcan

                <!-- /.col -->
                @php
                    use App\Models\Reservation;
                    $serCount = Reservation::count('id');
                @endphp
                @can('Create Reservation')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('reservations.create') }}" class="info-box-icon bg-warning elevation-1"><i
                                class="fa-solid fas fa-sticky-note"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('reservations.create') }}" class="info-box-text"> Number of Reservations</a>
                            <a href="{{ route('reservations.create') }}" class="info-box-number">{{ $serCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                @endcan
                <!-- /.col -->
                @php
                    use App\Models\Receipt;
                    $serCount = Receipt::count('id');
                @endphp

                @can('Create Receipt')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('receipts.create') }}" class="info-box-icon bg-warning elevation-1"><i
                                class="fa-solid fas fa-sticky-note"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('receipts.create') }}" class="info-box-text"> Number of Receipts</a>
                            <a href="{{ route('receipts.create') }}" class="info-box-number">{{ $serCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                @endcan

            </div>
        </div>

    @endsection

@section('scripts')

@endsection
