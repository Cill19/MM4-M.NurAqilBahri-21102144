<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function process(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $result = Admin::where('username', '=', $validateData['username'])->first();
        // var_dump($result);die;
        if ($result) {
            if (($request->password == $result->password)) {
                session(['username' => $request->username]);
                return redirect('/student');
            } else {
                return back()->withInput()->with('pesan', "Login Gagal");
            }
        } else {
            return back()->withInput()->with('pesan', "Login Gagal");
        }
    }
    public function logout()
    {
        session()->forget('username');
        return redirect('login')->with('pesan', 'Logout berhasil');
    }
}
