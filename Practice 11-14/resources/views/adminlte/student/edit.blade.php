@extends('admin_layout.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Mahasiswa
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-xl-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('student.update', ['student' => $student->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                        name="nim" value="{{ old('nim') ?? $student->nim }}">
                                    @error('nim')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama"
                                        name="nama" value="{{ old('name') ?? $student->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki"
                                                value="L" {{ (old('gender') ?? $student->gender) == 'L' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                                value="P" {{ (old('gender') ?? $student->gender) == 'P' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-control" name="jurusan" id="jurusan">
                                        <option value="Teknik Informatika"
                                            {{ (old('departement') ?? $student->departement) == 'Teknik Informatika' ? 'selected' : '' }}>
                                            Teknik Informatika
                                        </option>
                                        <option value="Sistem Informasi"
                                            {{ (old('departement') ?? $student->departement) == 'Sistem Informasi' ? 'selected' : '' }}>
                                            Sistem Informasi
                                        </option>
                                        <option value="Ilmu Komputer"
                                            {{ (old('departement') ?? $student->departement) == 'Ilmu Komputer' ? 'selected' : '' }}>
                                            Ilmu Komputer
                                        </option>
                                        <option value="Teknik Komputer"
                                            {{ (old('departement') ?? $student->departement) == 'Teknik Komputer' ? 'selected' : '' }}>
                                            Teknik Komputer
                                        </option>
                                        <option value="Teknik Telekomunikasi"
                                            {{ (old('departement') ?? $student->departement) == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                                            Teknik Telekomunikasi
                                        </option>
                                    </select>
                                    @error('departement')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') ?? $student->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar Profile</label>
                                    <div class="mb-2">
                                        <img height="150px" src="{{ url('') }}/{{ $student->image }}" class="rounded" alt="">
                                    </div>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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
