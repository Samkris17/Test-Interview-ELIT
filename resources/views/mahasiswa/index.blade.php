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
                <nav
                    class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
                >
                    <div>
                        <h3 class="fw-bold mb-3">Daftar Alumni ILMU KOMPUTER UDINUS</h3>
                    </div>
                </nav>

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
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Data Mahasiswa</div>
                        <div class="d-flex gap-2">
                            <nav
                                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
                            >
                                <form method="get" action="{{ route("mahasiswa.index") }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-search pe-1">
                                                <i class="fa fa-search search-icon"></i>
                                            </button>
                                        </div>
                                        <input
                                            type="text"
                                            placeholder="Search ..."
                                            class="form-control"
                                            name="query"
                                            value="{{ old('query', $query ?? '') }}"
                                        />
                                    </div>
                                </form>
                            </nav>
                            <a href="{{ route("mahasiswa.create") }}">
                                <button class="btn btn-primary">
                                    Tambah Mahasiswa
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col"><b>No.</b></th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Angkatan</th>
                                <th scope="col">Judul Skripsi</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mahasiswas as $mahasiswa)
                                <tr>
                                    <td><b>{{++$i}}.<b></td>
                                    <td>{{$mahasiswa->namaMahasiswa}}</td>
                                    <td>{{$mahasiswa->nimMahasiswa}}</td>
                                    <td align="center">{{$mahasiswa->angkatanMahasiswa}}</td>
                                    <td>{{$mahasiswa->judulskripsiMahasiswa}}</td>
                                    <td><a href="{{ route("pekerjaan.add", $mahasiswa->id) }}">
                                            <button class="btn btn-primary">
                                                Lihat / Tambah Pekerjaan
                                            </button>
                                        </a>
                                    </td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-bookmark"></i>
                                                Show
                                            </button>
                                        </a>
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">
                                            <button class="btn btn-secondary">
                                                <span class="btn-label"><i class="fa fa-plus"></i></span>
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route("mahasiswa.destroy", $mahasiswa->id) }}" method="post">
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
                        {{ $mahasiswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
