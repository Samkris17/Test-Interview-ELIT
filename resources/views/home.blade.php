@extends("layouts.template")
@section('title')
    <title>Dashboard</title>
@endsection
@section('content')
    <div class="main-header">
        <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="/" class="logo">
                    <img
                        src={{ asset("img/logo-elit.png") }}
                        alt="navbar brand"
                        class="navbar-brand"
                        height="20"
                    />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
        >
            <div class="container-fluid">

                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                    <li class="nav-item topbar-user dropdown hidden-caret">
                        <a
                            class="dropdown-toggle profile-pic"
                            data-bs-toggle="dropdown"
                            href="#"
                            aria-expanded="false"
                        >
                            <div class="avatar-sm">
                                <img
                                    src={{ asset("img/HAHA.jpg") }}
                                    alt="..."
                                    class="avatar-img rounded-circle"
                                />
                            </div>
                            <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">{{ auth()->user()->name }}</span>
                    </span>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                            <img
                                                src={{ asset("img/HAHA.jpg") }}
                                                alt="image profile"
                                                class="avatar-img rounded"
                                            />
                                        </div>
                                        <div class="u-text">
                                            <h4>{{ auth()->user()->name }}</h4>
                                            <p class="text-muted">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item btn btn-danger text-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <div class="container">
        <div class="page-inner">
            <div
                class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
                <div class="d-flex justify-content-between w-100">
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                    <a href="{{ route("mahasiswa.export.excel") }}">
                        <button class="btn btn-success">
                            Export Data Mahasiswa
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div
                                        class="icon-big text-center icon-primary bubble-shadow-small"
                                    >
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Mahasiswa</p>
                                        <h4 class="card-title">{{ $jml_mahasiswa }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div
                                        class="icon-big text-center icon-info bubble-shadow-small"
                                    >
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Mahasiswa Bekerja</p>
                                        <h4 class="card-title">{{ $jml_mahasiswa_bekerja }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Statistik Mahasiswa</div>
                                <div class="card-tools">
                                    <a
                                        href="#"
                                        class="btn btn-label-success btn-round btn-sm me-2"
                                    >
                          <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                          </span>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-label-info btn-round btn-sm">
                          <span class="btn-label">
                            <i class="fa fa-print"></i>
                          </span>
                                        Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="min-height: 375px">
                                <canvas id="statisticsChart"></canvas>
                            </div>
                            <div id="myChartLegend"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
