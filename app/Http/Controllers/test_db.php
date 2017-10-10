<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class test_db extends Controller
{
    public function select(){
    	$students = DB::select('select * from tb_siswa', [1]);
    	return view('home',['students' => $students]);
    }
}
