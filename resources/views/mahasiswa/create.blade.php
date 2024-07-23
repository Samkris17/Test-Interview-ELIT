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
                <div>
                    <h3 class="fw-bold mb-3">Tambah Mahasiswa</h3>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Data Mahasiswa</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('mahasiswa.store')}}" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" placeholder="Nama Mahasiswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nimMahasiswa" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nimMahasiswa" class="form-control" id="nimMahasiswa" placeholder="NIM Mahasiswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="angkatanMahasiswa" class="col-sm-2 col-form-label">Angkatan Mahasiswa</label>
                                <div class="col-sm-10">
                                    <select id="angkatanMahasiswa" name="angkatanMahasiswa"class="form-control">
                                        <option> </option>
                                        <option value="2012"> Angkatan 2012</option>
                                        <option value="2013"> Angkatan 2013</option>
                                        <option value="2014"> Angkatan 2014</option>
                                        <option value="2015"> Angkatan 2015</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="judulskripsiMahasiswa" class="col-sm-2 col-form-label">Judul Skripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="judulskripsiMahasiswa" rows="8" cols="80" placeholder="Masukkan Judul Skripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pembimbing1" class="col-sm-2 col-form-label">Pembimbing 1</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pembimbing1" class="form-control" id="pembimbing1" placeholder="Pembimbing 1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pembimbing2" class="col-sm-2 col-form-label">Pembimbing 2</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pembimbing2" class="form-control" id="pembimbing2" placeholder="Pembimbing 2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambarMahasiswa" class="col-sm-2 col-form-label">Pilih gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="gambarMahasiswa" class="form-control-file" id="gambarMahasiswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ijazahMahasiswa" class="col-sm-2 col-form-label">Pilih Ijazah</label>
                                <div class="col-sm-10">
                                    <input type="file" name="ijazahMahasiswa" class="form-control-file" id="ijazahMahasiswa">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <a href="{{route('mahasiswa.index')}}" class="btn btn-success">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
