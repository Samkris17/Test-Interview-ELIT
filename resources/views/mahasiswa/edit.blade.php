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
                        <div class="card-title">Edit Data Mahasiswa</div>
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
                        <form action="{{route('mahasiswa.update',$mahasiswa->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" value="{{$mahasiswa->namaMahasiswa}}" placeholder="Nama Mahasiswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nimMahasiswa" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nimMahasiswa"  class="form-control" id="nimMahasiswa" value="{{$mahasiswa->nimMahasiswa}}" placeholder="NIM Mahasiswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="angkatanMahasiswa" class="col-sm-2 col-form-label">Angkatan Mahasiswa</label>
                                <div class="col-sm-10">
                                    <select id="angkatanMahasiswa" name="angkatanMahasiswa"class="form-control">
                                        <option {{$mahasiswa->angkatanMahasiswa == '2012' ? 'selected' : ''}} value="2012"> Angkatan 2012</option>
                                        <option {{$mahasiswa->angkatanMahasiswa == '2013' ? 'selected' : ''}} value="2013"> Angkatan 2013</option>
                                        <option {{$mahasiswa->angkatanMahasiswa == '2014' ? 'selected' : ''}} value="2014"> Angkatan 2014</option>
                                        <option {{$mahasiswa->angkatanMahasiswa == '2015' ? 'selected' : ''}} value="2015"> Angkatan 2015</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="judulskripsiMahasiswa" class="col-sm-2 col-form-label">Judul Skripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="judulskripsiMahasiswa" rows="8" cols="80" placeholder="Masukkan Judul Skripsi">{{$mahasiswa->judulskripsiMahasiswa}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pembimbing1" class="col-sm-2 col-form-label">Pembimbing 1</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pembimbing1" class="form-control" value="{{$mahasiswa->pembimbing1}}" id="pembimbing1" placeholder="Pembimbing 1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pembimbing2" class="col-sm-2 col-form-label">Pembimbing 2</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pembimbing2" class="form-control" value="{{$mahasiswa->pembimbing2}}" id="pembimbing2" placeholder="Pembimbing 2">
                                </div>
                            </div>
                            <!--<div class="form-group row">
                                <label for="gambarMahasiswa" class="col-sm-2 col-form-label">Pilih gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="gambarMahasiswa">
                                <p class="text-danger">{{ $errors->first('gambarMahasiswa') }}</p>
                                </div>
                            </div>-->

                            <hr>
                            <div class="form-group">
                                <a href="{{route('mahasiswa.index')}}" class="btn btn-success">Kembali</a>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
