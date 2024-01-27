@extends('admin_layout.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Tabel Mahasiswa
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Tabel Mahasiswa</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Daftar Mahasiswa</h3>
                            <div class="box-tools">
                                <a href="{{ route('student.create') }}" class="btn btn-primary">
                                    Tambah Mahasiswa
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if (session()->has('pesan'))
                                <div class="alert alert-success">
                                    {{ session()->get('pesan') }}
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profil</th>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $mahasiswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img height="30px" src="{{ url('') }}/{{ $mahasiswa->image }}" class="rounded" alt=""></td>
                                            <td><a href="{{ route('student.show',['student' => $mahasiswa->id]) }}">{{ $mahasiswa->nim }}</a></td>
                                            <td>{{ $mahasiswa->name }}</td>
                                            <td>{{ $mahasiswa->gender == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                            <td>{{ $mahasiswa->departement }}</td>
                                            <td>{{ $mahasiswa->address == '' ? 'N/A' : $mahasiswa->address }}</td>
                                        </tr>
                                    @empty
                                        <td colspan="6" class="text-center">Tidak ada data...</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection
