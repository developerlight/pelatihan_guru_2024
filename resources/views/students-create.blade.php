@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <h3>Tambah Data Siswa Baru</h3>
        </div>


        <div class="row mt-3 table-responsive">
            <form method="POST" action="{{ route('students.add') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>NISN</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="nisn">
                            </td>
                        </tr>
                        <tr>
                            <td>Fullname</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="full_name">
                            </td>
                        </tr>
                        <tr>
                            <td>Callname</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="call_name">
                            </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <select name="gender_id" id="" class="form-control">
                                    <option value="">__pilih__</option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}" 
                                            {{ ($gender->id == old('gender_id')) ? 'selected' : '' }}>
                                            {{ $gender->gender }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Birth date</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="date" name="birth_date">
                            </td>
                        </tr>
                        <tr>
                            <td>Birth place</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="birth_place">
                            </td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td>
                                <!-- Religion Select -->
                                <!-- <label for="religion_id">Religion:</label> -->
                                <select name="religion_id" id="" class="form-control">
                                    <option value="">__pilih__</option>
                                    @foreach($religions as $religion)
                                        <option value="{{ $religion->id }}"
                                        {{ ($religion->id == old('religion_id')) ? 'selected' : '' }}>
                                        {{ $religion->religion }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Citizenship</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="citizenship">
                            </td>
                        </tr>
                        <tr>
                            <td>Child order</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="child_order">
                            </td>
                        </tr>
                        <tr>
                            <td>Sibling count</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="sibling_count">
                            </td>
                        </tr>
                        <tr>
                            <td>Language</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="language">
                            </td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input class="form-control" type="file"
                                    name="image">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success" type="submit">Tambah Data</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
