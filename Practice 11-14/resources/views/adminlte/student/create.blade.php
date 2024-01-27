@extends('admin_layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $data['module']['name'] }}
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xl-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $data['module']['name'] }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                            id="nim" name="nim" value="{{ old('nim') }}">
                                        @error('nim')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="laki_laki" value="L"
                                                {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="perempuan" value="P"
                                                {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        @error('jenis_kelamin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <select class="form-control" name="jurusan" id="jurusan">
                                            <option value="Teknik Informatika"
                                                {{ old('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>
                                                Teknik Informatika
                                            </option>
                                            <option value="Teknik Informatika"
                                                {{ old('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>
                                                Teknik Informatika
                                            </option>
                                            <option value="Sistem Informasi"
                                                {{ old('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>
                                                Sistem Informasi
                                            </option>
                                            <option value="Ilmu Komputer"
                                                {{ old('jurusan') == 'Ilmu Komputer' ? 'selected' : '' }}>
                                                Ilmu Komputer
                                            </option>
                                            <option value="Teknik Komputer"
                                                {{ old('jurusan') == 'Teknik Komputer' ? 'selected' : '' }}>
                                                Teknik Komputer
                                            </option>
                                            <option value="Teknik Telekomunikasi"
                                                {{ old('jurusan') == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                                                Teknik Telekomunikasi
                                            </option>

                                        </select>
                                        @error('jurusan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Gambar Profile</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Daftar</button>
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
