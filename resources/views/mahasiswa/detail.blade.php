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
                    <h3 class="fw-bold mb-3">Mahasiswa</h3>
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
                                            <img src="{{ asset("img/HAHA.jpg") }}" class="avatar-img rounded" alt="profile"/>
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
                        <div class="card-title">Data Mahasiswa</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group d-flex justify-content-center">
                                    <img src="{{ asset("storage/".$mahasiswa->gambarMahasiswa) }}" class="rounded-2" width="200px">
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
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{{ route('mahasiswa.index') }}">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nim"
                                        value="{{ $mahasiswa->angkatanMahasiswa }}"
                                        readonly
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="skripsi">Judul Skripsi</label>
                                    <textarea class="form-control" rows="8" cols="80" readonly>{{ $mahasiswa->judulskripsiMahasiswa }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pembimbing1">Pembimbing 1</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="pembimbing1"
                                        value="{{ $mahasiswa->pembimbing1 }}"
                                        readonly
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="pembimbing2">Pembimbing 2</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="pembimbing2"
                                        value="{{ $mahasiswa->pembimbing2 }}"
                                        readonly
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div>
                                    <a href="{{ route('mahasiswa.download.pdf', $mahasiswa->id) }}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-bookmark"></i>
                                            Download Ijazah
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
