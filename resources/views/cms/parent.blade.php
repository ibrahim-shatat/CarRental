<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'parent')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('cms/dist/img/car-solid.svg') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('view.admin') }}" class="nav-link">Home</a>
                </li>

            </ul>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('cms/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (Auth::guard('admin')->id())
                        @if (auth('admin')->user()->images!='')
                        <img class="brand-image img-circle elevation-3" src="{{ asset('storage/images/admin/'.auth('admin')->user()->images) }}" alt="User Image">
                        @else
                        <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}" alt="User Image">
                        @endif
                        @elseif(Auth::guard('supplier')->id())
                        @if (auth('supplier')->user()->images!='')
                        <img class="brand-image img-circle elevation-3" src="{{ asset('storage/images/supplier/'.auth('supplier')->user()->images) }}" alt="User Image">
                        @else
                        <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}" alt="User Image">
                        @endif
                        @elseif(Auth::guard('renter')->id())
                        @if (auth('renter')->user()->images!='')
                        <img class="brand-image img-circle elevation-3" src="{{ asset('storage/images/renter/'.auth('renter')->user()->images) }}" alt="User Image">
                        @else
                        <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}" alt="User Image">
                        @endif
                        @elseif(Auth::guard('buyer')->id())
                        @if (auth('buyer')->user()->images!='')
                        <img class="brand-image img-circle elevation-3" src="{{ asset('storage/images/buyer/'.auth('buyer')->user()->images) }}" alt="User Image">
                        @else
                        <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}" alt="User Image">
                        @endif
                        @else
                        <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}" alt="User Image">

                        @endif
                    </div>
                    <div class="info">
                        @if (Auth::guard('admin')->id())
                            <a href = "#" class="d-block"> {{auth('admin')->user()->full_name }} </a>
                        @elseif (Auth::guard('supplier')->id())
                            <a href = "#" class="d-block"> {{auth('supplier')->user()->full_name }} </a>
                        @elseif (Auth::guard('renter')->id())
                            <a href = "#" class="d-block"> {{auth('renter')->user()->full_name }} </a>
                        @elseif (Auth::guard('buyer')->id())
                            <a href = "#" class="d-block"> {{auth('buyer')->user()->full_name }} </a>
                        @else
                        <a href = "#" class="d-block"> Users</a>
                        @endif
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                            <li class="nav-item menu-open">
                                <a href="{{ route('view.admin') }}" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                        @canAny(['Index Role', 'Create Role', 'Index Permission', 'Create Permission'])
                            <li class="nav-header">Role And Permission</li>
                            @canAny(['Index Role', 'Create Role'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-user-cog"></i>
                                        <p>
                                            Role
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Role')
                                            <li class="nav-item">
                                                <a href="{{ route('roles.index') }}" class="nav-link">
                                                    <i class="fas fa-list nav-icon"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Role')
                                            <li class="nav-item">
                                                <a href="{{ route('roles.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>

                                </li>
                            @endcanany
                            @canAny(['Index Permission', 'Create Permission'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-user-cog"></i>
                                        <p>
                                            Permission
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        @can('Index Permission')
                                            <li class="nav-item">
                                                <a href="{{ route('permissions.index') }}" class="nav-link">
                                                    <i class="fas fa-list nav-icon"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Permission')
                                            <li class="nav-item">
                                                <a href="{{ route('permissions.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                        @endcanany
                        @canAny(['Index Admin', 'Create Admin', 'Index Supplier', 'Create Supplier', 'Index Renter',
                            'Create Renter', 'Index Buyer', 'Create Buyer'])
                            <li class="nav-header">User Mangment</li>
                            @canAny(['Index Admin', 'Create Admin'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-user-cog"></i>
                                        <p>
                                            Admin
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Admin')
                                            <li class="nav-item">
                                                <a href="{{ route('admins.index') }}" class="nav-link">
                                                    <i class="fas fa-list nav-icon"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Admin')
                                            <li class="nav-item">
                                                <a href="{{ route('admins.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany

                            @canAny(['Index Supplier', 'Create Supplier'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Supplier
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        @can('Index Supplier')
                                            <li class="nav-item">
                                                <a href="{{ route('suppliers.index') }}" class="nav-link">
                                                    <i class="fas fa-list nav-icon"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Supplier')
                                            <li class="nav-item">
                                                <a href="{{ route('suppliers.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany

                            @canAny(['Index Renter', 'Create Renter'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Renter
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Renter')
                                            <li class="nav-item">
                                                <a href="{{ route('renters.index') }}" class="nav-link">
                                                    <i class="fas fa-list nav-icon"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Renter')
                                            <li class="nav-item">
                                                <a href="{{ route('renters.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                            @canAny(['Index Buyer', 'Create Buyer'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Buyer
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        @can('Index Buyer')
                                            <li class="nav-item">
                                                <a href="{{ route('buyers.index') }}" class="nav-link">
                                                    <i class="fas fa-list nav-icon"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('Create Buyer')
                                            <li class="nav-item">
                                                <a href="{{ route('buyers.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan

                                    </ul>
                                </li>
                            @endcanany
                            </li>
                        @endcanany
                        @canAny([
                            'Index Car',
                            'Create Car',
                            'Index CarShow',
                            'Create CarShow',
                            'Index TimeSlot',
                            'Create
                            TimeSlot',
                            'Index Country',
                            'Create Country',
                            'Index City',
                            'Create City',
                            ])
                            <li class="nav-header">Content Mangment</li>
                            @canAny(['Index Car', 'Create Car'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-car"></i>
                                        <p>
                                            Car
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Car')
                                            <li class="nav-item">
                                                <a href="{{ route('cars.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Car')
                                            <li class="nav-item">
                                                <a href="{{ route('cars.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                            @canAny(['Index Country', 'Create Country'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-globe-europe"></i>
                                        <p>
                                            Country
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Country')
                                            <li class="nav-item">
                                                <a href="{{ route('countries.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Country')
                                            <li class="nav-item">
                                                <a href="{{ route('countries.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                            @canAny(['Index City', 'Create City'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-city"></i>
                                        <p>
                                            City
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index City')
                                            <li class="nav-item">
                                                <a href="{{ route('cities.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create City')
                                            <li class="nav-item">
                                                <a href="{{ route('cities.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                            @canAny(['Index CarShow', 'Create CarShow'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-warehouse"></i>
                                        <p>
                                            CarShow
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index CarShow')
                                            <li class="nav-item">
                                                <a href="{{ route('car_shows.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create CarShow')
                                            <li class="nav-item">
                                                <a href="{{ route('car_shows.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                            @canAny(['Index TimeSlot', 'Create TimeSlot'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-clock"></i>
                                        <p>
                                            Time Slot
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index TimeSlot')
                                            <li class="nav-item">
                                                <a href="{{ route('timeslots.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create TimeSlot')
                                            <li class="nav-item">
                                                <a href="{{ route('timeslots.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>

                                </li>
                            @endcanany

                        @endcanany
                        @canAny([
                            'Index Reservation',
                            'Create Reservation',
                            'Index Receipt',
                            'Create Receipt',
                            'Index
                            Review',
                            'Create Review',
                            ])
                            <li class="nav-header">Opreations</li>
                            @canAny(['Index Reservation', 'Create Reservation'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-sticky-note"></i>
                                        <p>
                                            Reservation
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Reservation')
                                            <li class="nav-item">
                                                <a href="{{ route('reservations.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Reservation')
                                            <li class="nav-item">
                                                <a href="{{ route('reservations.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                            @canAny(['Index Receipt', 'Create Receipt'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-scroll"></i>
                                        <p>
                                            Receipt
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Receipt')
                                            <li class="nav-item">
                                                <a href="{{ route('receipts.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Receipt')
                                            <li class="nav-item">
                                                <a href="{{ route('receipts.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan

                                    </ul>
                                </li>
                            @endcanany
                            @canAny(['Index Review', 'Create Review'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-star"></i>
                                        <p>
                                            Review
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('Index Review')
                                            <li class="nav-item">
                                                <a href="{{ route('reviews.index') }}" class="nav-link">
                                                    <i class=" nav-icon fas fa-list"></i>
                                                    <p>Index</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Create Review')
                                            <li class="nav-item">
                                                <a href="{{ route('reviews.create') }}" class="nav-link">
                                                    <i class="fas fa-plus-circle nav-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                        @endcanany
                        <li class="nav-header">Settings</li>
                        <li class="nav-item">
                        @if (Auth::guard('admin')->id())

                        <a href="admin/admins/{{ Auth::guard('admin')->id()}}/edit" class="nav-link ">
                            <i class="nav-icon fas fa-file"></i>
                                <p>Edit Your Profile</p></a>
                        @elseif (Auth::guard('supplier')->id())
                        <a href="admin/suppliers/{{ Auth::guard('supplier')->id()}}/edit" class="nav-link ">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Edit Your Profile</p></a>
                        @elseif (Auth::guard('renter')->id())
                        <a href="admin/renters/{{ Auth::guard('renter')->id()}}/edit" class="nav-link ">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Edit Your Profile</p></a>
                        @elseif (Auth::guard('buyer')->id())
                        <a href="admin/buyers/{{ Auth::guard('buyer')->id()}}/edit" class="nav-link ">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Edit Your Profile</p></a>
                        @else
                        @endif
                        {{-- </li>
                        <li class="nav-item">
                            @if (Auth::guard('admin')->id())
                            <a href="{{ route('admins_changePassword')}}" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Change your password </p>
                            </a>
                            @elseif (Auth::guard('supplier')->id())
                            <a href="{{ route('suppliers_changePassword') }}" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Change your password </p>
                            </a>
                            @elseif (Auth::guard('renter')->id())
                            <a href="{{ route('renters_changePassword') }}" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Change your password </p>
                            </a>
                            @elseif (Auth::guard('buyer')->id())
                            <a href="{{ route('buyers_changePassword') }}" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Change your password </p>
                            </a>
                            @endif --}}
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('view.logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Log-out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('sub-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('view.admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">@yield('sub-title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ now()->year }}-{{ now()->year + 1 }} -{{ env('APP_NAME') }}.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> {{ env('App_version') }}
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('cms/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('cms/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('cms/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('cms/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/crud.js') }}"></script>

    @yield ('scripts')

</body>

</html>
