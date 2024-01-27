@extends('admin_layout.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Biodata {{ $student->name }}
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Biodata</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="d-flex justify-content-end align-items-center mb-3">
                                <h2 class="mr-auto">Biodata {{ $student->name }}</h2>
                                <a href="{{ route('student.edit',['student' => $student->id]) }}" class="btn btn-primary ms-3">Edit</a>
                                <form action="{{ route('student.destroy',['student'=>$student->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger ml-3 ms-3">Hapus</button>
                                </form>
                            </div>
                            @if (session()->has('pesan'))
                                <div class="alert alert-success">
                                    {{ session()->get('pesan') }}
                                </div>
                            @endif
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <td>NIM</td>
                                        <td>{{ $student->nim }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $student->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>{{ $student->gender == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>{{ $student->departement }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $student->address == '' ? 'N/A' : $student->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
