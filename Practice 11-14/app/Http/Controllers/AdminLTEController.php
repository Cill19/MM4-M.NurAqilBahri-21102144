<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLTEController extends Controller
{
    public function index()
    {
        // return 'o';
        $data['module']['name'] = "Beranda";
        return view('adminlte.index', ['data' => $data]);
    }
}
