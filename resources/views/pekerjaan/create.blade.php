@extends('layouts.template')
@section('content')
    <div class="main-header">
        <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="/" class="logo">
                    <img
                        src={{ asset("img/HAHA.jpg") }}
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
                <div>
                    <h3 class="fw-bold mb-3">Tambah Pekerjaan</h3>
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
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="page-inner">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Data Pekerjaan Mahasiswa</div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route("pekerjaan.store") }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group hidden" style="display: none">
                                        <label for="mahasiswa_id">Id</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="mahasiswa_id"
                                            name="mahasiswa_id"
                                            value="{{ $mahasiswa->id }}"
                                            readonly
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nama"
                                            value="{{ $mahasiswa->namaMahasiswa }}"
                                            readonly
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nim"
                                            value="{{ $mahasiswa->nimMahasiswa }}"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="pekerjaan"
                                            name="pekerjaan"
                                            required
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="alamat"
                                            name="alamat"
                                            required
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="telepon"
                                            name="telepon"
                                            required
                                        />
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-warning" href="{{ route('pekerjaan.index') }}">
                                            Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="btn-label">
                                              <i class="fa fa-archive"></i>
                                            </span>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
