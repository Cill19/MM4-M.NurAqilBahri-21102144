<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLTEStudentController extends Controller
{
    public function create()
    {
        $data['module']['name'] = "Tambah Mahasiswa";
        return view('adminlte.student.create', ['data' => $data]);
    }
}
