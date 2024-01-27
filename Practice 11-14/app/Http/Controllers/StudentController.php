<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Symfony\Component\HttpFoundation\File\File;

class StudentController extends Controller
{
    public function index()
    {
        $mahasiswas = Student::all();
        return view('adminlte.student.index', ['students' => $mahasiswas]);
    }
    public function create()
    {
        $data['module']['name'] = "Tambah Mahasiswa";
        return view('adminlte.student.create', [
            'data' => $data,
            
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:8,unique:students',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
            'image' => 'required|file|image|max:1000',

        ]);
        $mahasiswa = new Student();
        $mahasiswa->nim = $validateData['nim'];
        $mahasiswa->name = $validateData['nama'];
        $mahasiswa->gender = $validateData['jenis_kelamin'];
        $mahasiswa->departement = $validateData['jurusan'];
        $mahasiswa->address = $validateData['alamat'];
        if ($request->hasFile('image')) {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-' . time() . "." . $extFile;
            $path = $request->image->move('assets/images', $namaFile);
            $mahasiswa->image = $path;
        }
        $mahasiswa->save();
        return redirect()->route('adminlte.student.index')->with('pesan', 'Penambahan data berhasil');
    }

    public function show($student_id)
    {
        $result = Student::findOrFail($student_id);
        return view('adminlte.student.show', ['student' => $result]);
    }

    public function edit($student_id)
    {
        $result = Student::findOrFail($student_id);
        return view('adminlte.student.edit', ['student' => $result]);
    }

    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:8,unique:students',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
            'image' => "file|image|max:1000"
        ]);
        $student->nim = $validateData['nim'];
        $student->name = $validateData['nama'];
        $student->gender = $validateData['jenis_kelamin'];
        $student->departement = $validateData['jurusan'];
        $student->address = $validateData['alamat'];
        if ($request->hasFile('image')) {
            // var_dump($student->image);
            // die;
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-' . time() . "." . $extFile;
            // File::delete($student->image);
            if (file_exists($student->image)) {
                unlink($student->image);
            }
            $path = $request->image->move('assets/images', $namaFile);
            $student->image = $path;
        }

        $student->save();


        return redirect()->route('adminlte.student.show', ['student' => $student->id])->with('pesan', 'Perubahan data berhasil');
    }

    public function destroy(Request $request, Student $student)
    {
        if (file_exists($student->image)) {
            unlink($student->image);
        }
        $student->delete();
        return redirect()->route('adminlte.student.index')->with('pesan', 'Hapus data berhasil');
    }
}
