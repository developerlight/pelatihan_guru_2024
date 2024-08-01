@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <strong>Sukses!</strong> {{ session('success') }}
                    </div>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <strong>Terjadi Kesalahan!</strong> {{ session('error') }}
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <h3>Halaman Data Siswa</h3>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Kategori</a>
            </div>
        </div>

        <h3>Current page : {{ $datas->currentPage() }}</h3>
        <div class="row mt-3 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>NISN</th>
                        <th>Fullname</th>
                        <th>Gender</th>
                        <th>Birth Place</th>
                        <th>Birth Date</th>
                        <th>Citizenship</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td><img src="{{ asset('storage/' . $data->image) }}" alt="" width="auto" height="100"></td>
                            <td>{{ $data->nisn }}</td>
                            <td>{{ $data->full_name }}</td>
                            <td>{{ $data->gender->gender }}</td>
                            <td>{{ $data->birth_place }}</td>
                            <td>{{ $data->birth_date }}</td>
                            <td>{{ $data->citizenship }}</td>
                            <td>
                                <form method="POST" action="{{ route('students.delete', $data->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('students.show', $data->id) }}" class="btn btn-info">Info</a>
                                    <a class="btn btn-success" href="{{ route('students.edit', $data->id) }}">Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $datas->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>
@endsection
