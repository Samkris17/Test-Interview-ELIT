<?php

namespace App\Http\Controllers;

use App\Exports\mahasiswaExport;
use App\Pekerjaan;
use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request):View
    {
        $query = $request->input('query');
        if ($query){
            $mahasiswas = Mahasiswa::orderBy('id','asc')
                ->where('namaMahasiswa', 'like', '%'.$query.'%')
                ->orWhere('nimMahasiswa', 'like', '%'.$query.'%')
                ->orWhere('angkatanMahasiswa', 'like', '%'.$query.'%')
                ->orWhere('judulskripsiMahasiswa', 'like', '%'.$query.'%')
                ->paginate(8);
            return view('mahasiswa.index',compact('mahasiswas', 'query'))
                ->with('i',(request()->input('page',1) -1)*5);
        }
        $mahasiswas = Mahasiswa::orderBy('id','asc')->paginate(8);
        return view('mahasiswa.index',compact('mahasiswas'))
                ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
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
            'namaMahasiswa'=>'required',
            'nimMahasiswa' => 'required|max:10',
            'angkatanMahasiswa'=>'required',
            'judulskripsiMahasiswa' => 'required',
            'pembimbing1'=>'required',
            'pembimbing2' => 'required',
            'gambarMahasiswa' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'ijazahMahasiswa' => 'required|file|mimes:pdf|max:5120'
        ]);

        $mahasiswa = Mahasiswa::create($request->except(['gambarMahasiswa', 'ijazahMahasiswa']));
        $gambarPath = $request->file('gambarMahasiswa')->storeAs('gambarMahasiswa', $mahasiswa->id . '.' . $request->file('gambarMahasiswa')->getClientOriginalExtension(), 'public');
        $ijazahPath = $request->file('ijazahMahasiswa')->storeAs('ijazahMahasiswa', $mahasiswa->id . '.' . $request->file('ijazahMahasiswa')->getClientOriginalExtension(), 'public');

        $mahasiswa->update([
            'gambarMahasiswa' => $gambarPath,
            'ijazahMahasiswa' => $ijazahPath
        ]);

        return redirect()->route('mahasiswa.index')
                         ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaMahasiswa'=>'required',
            'nimMahasiswa' => 'required|max:10',
            'angkatanMahasiswa'=>'required',
            'judulskripsiMahasiswa' => 'required',
            'pembimbing1'=>'required',
            'pembimbing2' => 'required',
        ]);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->namaMahasiswa = $request->get('namaMahasiswa');
        $mahasiswa->nimMahasiswa = $request->get('nimMahasiswa');
        $mahasiswa->angkatanMahasiswa = $request->get('angkatanMahasiswa');
        $mahasiswa->judulskripsiMahasiswa = $request->get('judulskripsiMahasiswa');
        $mahasiswa->pembimbing1 = $request->get('pembimbing1');
        $mahasiswa->pembimbing2 = $request->get('pembimbing2');
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }

    public function addJobs($id)
    {
        $mahasiswa = Mahasiswa::query()->find($id);
        $job = Pekerjaan::query()->where('mahasiswa_id', '=', $id)->first();
        if ($job == null){
            return view('pekerjaan.create', compact('mahasiswa'));
        }else{
            return redirect()->route('pekerjaan.show', $job->id);
        }
    }

    public function export_excel()
    {
        return Excel::download(new mahasiswaExport(), 'data_mahasiswa.xlsx');
    }

    public function download_pdf(Request $request, int $id)
    {
        $ijazahPath = Mahasiswa::query()->where('id', '=', $id)->get(['ijazahMahasiswa'])->first();

        if (!empty($ijazahPath->ijazahMahasiswa)){
            try {
                $path = storage_path('app/public/'.$ijazahPath->ijazahMahasiswa);
                return response()->download($path);
            }catch (\Exception $e){
                return redirect()->back()->with("error", "Terjadi kesalahan");
            }
        }else{
            return redirect()->back()->with("error", "Mahasiswa belum upload ijazah");
        }
    }
}
