<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Pekerjaan::query()->with(['mahasiswa' => function ($query) {
            $query->select('id', 'namaMahasiswa', 'nimMahasiswa');
        }])->get();
        return view('pekerjaan.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $updateJob = Pekerjaan::query()->create($request->only(['mahasiswa_id', 'pekerjaan', 'alamat', 'telepon']));
        if ($updateJob){
            return \redirect()->back()->with("success", "Success create data");
        }else{
            return \redirect()->back()->with("error", "Failed create data");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan):View
    {
        $job = Pekerjaan::query()->with(['mahasiswa' => function ($query) {
            $query->select('id', 'namaMahasiswa', 'nimMahasiswa');
        }])->where('pekerjaans.id', '=', $pekerjaan->id)->first();

        return view('pekerjaan.detail', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $updateJob = Pekerjaan::query()->find($pekerjaan->id)->update($request->only(['mahasiswa_id', 'pekerjaan', 'alamat', 'telepon']));
        if ($updateJob){
            return \redirect()->back()->with("success", "Success update data");
        }else{
            return \redirect()->back()->with("error", "Failed update data");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        $delete = Pekerjaan::query()->find($pekerjaan->id)->delete();
        if ($delete){
            return \redirect()->back()->with("success", "Success delete data");
        }else{
            return \redirect()->back()->with("error", "Failed delete data");
        }
    }
}
