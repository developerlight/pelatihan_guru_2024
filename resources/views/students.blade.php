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
            <h3>Ini Halaman Kategori</h3>
        </div>


        <div class="row mb-3">
            <div class="col-md-3">
                <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Kategori</a>
            </div>


        </div>

        <h3>Current page : {{$datas->currentPage()}}</h3>
        <div class="row mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>NISN</th>
                        <th>Fullname</th>
                        <th>Callname</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Birth Place</th>
                        <th>religion</th>
                        <th>Citizenship</th>
                        <th>Child Order</th>
                        <th>Sibling Count</th>
                        <th>Language</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td><img src="{{ asset('storage/' . $data->image) }}" alt="" width="auto" height="100"></td>
                            <td>{{ $data->nisn }}</td>
                            <td>{{ $data->full_name }}</td>
                            <td>{{ $data -> call_name}}</td>
                            <td>{{ $data -> gender}}</td>
                            <td>{{ $data -> birth_date}}</td>
                            <td>{{ $data -> birth_place}}</td>
                            <td>{{ $data -> religion}}</td>
                            <td>{{ $data -> citizenship}}</td>
                            <td>{{ $data -> child_order}}</td>
                            <td>{{ $data -> sibling_count}}</td>
                            <td>{{ $data -> language}}</td>
                            <td>
                                <form method="POST" action="{{ route('students.delete', $data -> id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-success" href="{{ route('students.edit', $data->id)}}">Edit</a>
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apa anda yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @php
                    $previous = $datas->currentPage() > 1 ? $datas->currentPage() - 1 : 1;
                    $next = $datas->currentPage() < $datas->lastPage() ? $datas->currentPage() + 1 : $datas->lastPage();
                @endphp

            </table>
            <button>
                <a href="http://127.0.0.1:8000/students?page={{$previous}}">   <   </a> 
                <a href="http://127.0.0.1:8000/students?page={{$next}}">   >   </a>
            </button>
            
        </div>
    </div>
@endsection
