@extends('layouts.template')
@section('content')
    <div class="main-header">
        <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="/" class="logo">
                    <img
                        src="img/logo-elit.png"
                        alt="navbar brand"
                        class="navbar-brand"
                        height="50"
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
                <div>
                    <h3 class="fw-bold mb-3">Pekerjaan</h3>
                </div>
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
                                    src="img/HAHA.jpg"
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
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Data Pekerjaan Mahasiswa</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Alamat Pekerjaan</th>
                                <th scope="col">Telepon Pekerjaan</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $index => $job)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $job->mahasiswa->nimMahasiswa }}</td>
                                    <td>{{ $job->mahasiswa->namaMahasiswa }}</td>
                                    <td>{{ $job->pekerjaan }}</td>
                                    <td>{{ $job->alamat }}</td>
                                    <td>{{ $job->telepon }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('pekerjaan.show', $job->id) }}">
                                            <button class="btn btn-secondary">
                                                <span class="btn-label"><i class="fa fa-plus"></i></span>
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route("pekerjaan.destroy", $job->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                            <span class="btn-label">
                                              <i class="fa fa-archive"></i>
                                            </span>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(count($jobs) == 0)
                            <div class="w-100 text-center"><b>Tidak ada data</b></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
