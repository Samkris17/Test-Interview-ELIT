<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Pekerjaan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_mahasiswa = Mahasiswa::query()->count('id');
        $jumlah_mahasiswa_bekerja = Pekerjaan::query()->count('id');

        return view('home', [
            "jml_mahasiswa" => $jumlah_mahasiswa,
            "jml_mahasiswa_bekerja" => $jumlah_mahasiswa_bekerja
        ]);
    }

    public function statistic():JsonResponse
    {
        $counts = Mahasiswa::select('angkatanMahasiswa as angkatan', \DB::raw('count(*) as jumlah'))
            ->groupBy('angkatan')
            ->get();

        return JsonResponse::create($counts);
    }
}
