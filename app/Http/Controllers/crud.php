<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crud extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $datas = DB::table('tb_siswa')->paginate(10);
        return view('index',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new student;
        
        $this->validate($request,[
            'nama'=>'Required|Alpha',
            'kelas'=>'Required',
            'jurusan'=>'Required'
        ]);
        $student->nama = $request->nama;
        $student->kelas = $request->kelas;
        $student->jurusan = $request->jurusan;
        if($student->save()){
            $request->session()->flash('alert-success',"Proses insert berhasil.");
            return redirect()->route('test.index');
        }
        else{
            $request->session()->flash('alert-danger',"Proses insert gagal.");
            return redirect()->route('test.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = student::find($id);
        return view('edit',compact('student'));
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
        $student = student::find($id);

        $student->nama = $request->nama;
        $student->kelas = $request->kelas;
        $student->jurusan = $request->jurusan;
        if($student->save()){
            $request->session()->flash('alert-success',"Proses update berhasil.");
            return redirect()->route('test.index');
        }
        else{
            $request->session()->flash('alert-danger',"Proses update gagal.");
            return redirect()->route('test.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::find($id)->delete();
    }
}
